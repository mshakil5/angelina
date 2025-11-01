<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqQuestion;
use Illuminate\Support\Facades\Cache;
use App\Models\CompanyDetails;
use SEOMeta;
use OpenGraph;
use Twitter;
use App\Models\Master;
use App\Models\Contact;
use App\Models\ContactEmail;
use App\Mail\ContactMail;
use App\Models\Banner;
use App\Models\ClientReview;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use App\Models\Slider;
use App\Models\Content;
use App\Models\Tag;
use App\Models\ContentCategory;
use App\Models\JobList;
use App\Models\Plan;
use App\Models\Section;
use App\Models\TeamMember;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Newsletter;
use App\Models\Reference;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index()
    {
        $company = CompanyDetails::select('company_name', 'fav_icon', 'google_site_verification', 'footer_content', 'facebook', 'twitter','instagram', 'youtube',  'linkedin', 'website', 'phone1', 'email1', 'address1','company_logo', 'meta_title', 'meta_description', 'meta_keywords', 'meta_image','copyright','google_map')->first();

        $welcome = Master::firstOrCreate(['name' => 'welcome']);

        $sliders = Cache::remember('active_sliders', now()->addDay(), function () {
            return Slider::where('status', 1)->latest()->get();
        });

        $about1 = Master::firstOrCreate(['name' => 'about1']);

        $about2 = Master::firstOrCreate(['name' => 'about2']);

        $blogs = Cache::remember('active_blogs', now()->addDay(), function () {
            return Content::where('status', 1)
                ->where('type', 2)
                ->latest()
                ->get();
        });

        $features = Cache::remember('active_features', now()->addDay(), function () {
            return Service::orderByRaw('sl = 0, sl ASC')->orderBy('id', 'desc')->where('type', 2)->where('status', 1)->get();
        });

        $services = Cache::remember('active_services', now()->addDay(), function () {
            return Service::orderByRaw('sl = 0, sl ASC')->orderBy('id', 'asc')->where('type', 1)->limit(3)->where('status', 1)->get();
        });

        $service = Master::firstOrCreate(['name' => 'service']);

        $reviews = Cache::remember('active_reviews', now()->addDay(), function () {
            return ClientReview::where('status', 1)->latest()->get();
        });

        $galleries = Content::with('category','images')->where('type', 1)->latest()->get();
        $faqs = Cache::remember('faqs', now()->addDay(), function () {
            return FaqQuestion::orderBy('id', 'asc')->get();
        });

        $rooms = Content::with('category')->where('type', 2)->latest()->get();

        $sections = Section::where('status', 1)
            ->orderBy('sl', 'asc')
            ->get();

        $this->seo(
            $company?->meta_title ?? '',
            $company?->meta_description ?? '',
            $company?->meta_keywords ?? '',
            $company?->meta_image ? asset('images/company/meta/' . $company->meta_image) : null
        );
      return view('frontend.index', compact('welcome', 'sliders', 'about1', 'services', 'about2', 'blogs', 'features', 'service', 'reviews', 'sections', 'galleries', 'faqs','features','rooms','company'));
    }

    public function type($slug)
    {
        $typeMap = [
            'blog'    => ['id' => 2, 'cache' => 'active_blogs'],
            'event'   => ['id' => 3, 'cache' => 'active_events'],
            'news'    => ['id' => 4, 'cache' => 'active_news'],
        ];

        if(!isset($typeMap[$slug])) {
            abort(404);
        }

        $typeId = $typeMap[$slug]['id'];
        $cacheKey = $typeMap[$slug]['cache'];

        $contents = Cache::remember($cacheKey, now()->addDay(), function() use ($typeId) {
            return Content::with('category')
                ->where('status', 1)
                ->where('type', $typeId)
                ->latest()
                ->get();
        });

        return view('frontend.contents', compact('contents', 'slug'));
    }

    public function contentDetails($type, $slug)
    {
        $typeMap = [
            'blog'  => 2,
            'event' => 3,
            'news'  => 4,
        ];

        if (!isset($typeMap[$type])) abort(404);

        $typeId = $typeMap[$type];

        $content = Content::with(['category', 'tags', 'createdBy'])
            ->where('slug', $slug)
            ->where('type', $typeId)
            ->where('status', 1)
            ->firstOrFail();

        $otherContents = Content::select('id', 'slug', 'short_title', 'publishing_date')
            ->where('type', $typeId)
            ->where('status', 1)
            ->where('id', '!=', $content->id)
            ->latest('publishing_date')
            ->take(5)
            ->get();

        $tags = Tag::whereHas('contents', fn($q) => $q->where('type', $typeId))->get();

        $this->seo(
            $content?->meta_title ?? '',
            $content?->meta_description ?? '',
            $content?->meta_keywords ?? '',
            $content?->meta_image ? asset('images/content/' . $content->meta_image) : null
        );

        return view('frontend.content-details', compact('content', 'otherContents', 'tags', 'type', 'slug'));
    }

    public function categoryContents($type, $categorySlug)
    {
        $typeMap = [
            'blog'    => 2,
            'event'   => 3,
            'news'    => 4,
        ];

        if (!isset($typeMap[$type])) abort(404);

        $typeId = $typeMap[$type];

        $category = ContentCategory::where('slug', $categorySlug)->firstOrFail();

        $relationMap = [
            2 => 'blogContents',
            3 => 'eventContents',
            4 => 'newsContents',
        ];

        $contents = $category->{$relationMap[$typeId]}()->latest('publishing_date')->get();

        return view('frontend.content-category', compact('contents', 'type', 'category'));
    }

    public function tagContents($type, $tagSlug)
    {
        $typeMap = [
            'blog'  => 2,
            'event' => 3,
            'news'  => 4,
        ];

        if (!isset($typeMap[$type])) abort(404);
        $typeId = $typeMap[$type];

        $tag = Tag::where('slug', $tagSlug)->firstOrFail();

        $contents = $tag->contents()
                        ->where('type', $typeId)
                        ->where('status', 1)
                        ->latest('publishing_date')
                        ->get();

        return view('frontend.content-tag', compact('contents', 'type', 'tag'));
    }

    public function searchContent(Request $request)
    {
        $query = $request->get('query', '');
        $type = $request->get('type', '');

        $typeMap = [
            'blog'  => 2,
            'event' => 3,
            'news'  => 4,
        ];

        if(!isset($typeMap[$type])) {
            return '<p>No results found.</p>';
        }

        $typeId = $typeMap[$type];

        $contents = Content::where('type', $typeId)
            ->where('status', 1)
            ->where(function($q) use ($query) {
                $q->where('short_title', 'like', "%{$query}%")
                  ->orWhere('long_title', 'like', "%{$query}%");
            })
            ->latest('publishing_date')
            ->take(5)
            ->get();

        if($contents->isEmpty()) return '<p>No results found.</p>';

        $html = '';
        foreach($contents as $content) {
            $html .= '<div class="post-item">';
            $html .= '<h4><a href="'.route('content.show', ['type' => array_search($content->type, $typeMap), 'slug' => $content->slug]).'">'
                    .($content->short_title ?? $content->title).'</a></h4>';
            $html .= '<time datetime="'.$content->publishing_date.'">'
                    .date('M j, Y', strtotime($content->publishing_date)).'</time>';
            $html .= '</div>';
        }

        return $html;
    }
    
    public function contact()
    {
      $contact = Master::firstOrCreate(['name' => 'contact']);

      if($contact){
          $this->seo(
              $contact->meta_title,
              $contact->meta_description,
              $contact->meta_keywords,
              $contact->meta_image ? asset('images/meta_image/' . $contact->meta_image) : null
          );
      }

      $company = CompanyDetails::select('address1', 'phone1', 'email1')->first();
      return view('frontend.contact', compact('contact', 'company'));
    }



    public function storeContact(Request $request)
    {

        
        // try {
            
        // } catch (ValidationException $e) {
        //     throw ValidationException::withMessages($e->errors())
        //         ->redirectTo(url()->previous() . '#callback');
        // }


        $request->validate([
                'first_name' => 'required|string|min:2|max:50',
                'last_name'  => 'required|string|min:2|max:50',
                'email' => 'required|email|max:50',
                'dob' => 'required|date|after_or_equal:' . now()->subYears(5)->format('Y-m-d'),
                'phone' => ['required'],
                'subject' => 'nullable|string|max:255',
                'message' => 'nullable|string|max:2000',
            ]);

            $contact = new Contact();
            $contact->first_name = $request->input('first_name');
            $contact->last_name  = $request->input('last_name');
            $contact->email      = $request->input('email');
            $contact->phone      = $request->input('phone');
            $contact->subject    = $request->input('subject');
            $contact->dob        = $request->input('dob');
            $contact->message    = $request->input('message');
            $contact->pref_time  = $request->input('prefTime');
            $contact->nursery    = $request->input('nursery');
            $contact->save();

            $contactEmails = ContactEmail::where('status', 1)->pluck('email');

            foreach ($contactEmails as $contactEmail) {
                Mail::to($contactEmail)->send(new ContactMail($contact));
            }


            return redirect()->to(url()->previous() . '#callback')
                            ->with('success', 'Your message has been sent successfully!');

    }


    public function privacyPolicy()
    {
        $companyPrivacy = Cache::rememberForever('company_privacy', function () {
            return CompanyDetails::select('privacy_policy')->first();
        });

        return view('frontend.privacy', compact('companyPrivacy'));
    }

    public function termsAndConditions()
    {
        $companyDetails = Cache::rememberForever('company_terms', function () {
            return CompanyDetails::select('terms_and_conditions')->first();
        });
        return view('frontend.terms', compact('companyDetails'));
    }

    public function frequentlyAskedQuestions()
    {
        $faqs = FaqQuestion::orderBy('id', 'asc')->get();
        return view('frontend.faq', compact('faqs'));
    }

    public function gallery()
    {
        $contents = Content::with('images')
                    ->where('type', 1)
                    ->where('status', 1)
                    ->latest()
                    ->get();

        return view('frontend.gallery', compact('contents'));
    }

    public function team()
    {
        $teamMembers = TeamMember::where('status', 1)->latest()->get();
        return view('frontend.team', compact('teamMembers'));
    }

    private function seo($title = null, $description = null, $keywords = null, $image = null)
    {
        if ($title) {
            SEOMeta::setTitle($title);
            OpenGraph::setTitle($title);
            Twitter::setTitle($title);
        }

        if ($description) {
            SEOMeta::setDescription($description);
            OpenGraph::setDescription($description);
            Twitter::setDescription($description);
        }

        if ($keywords) {
            SEOMeta::setKeywords($keywords);
        }

        if ($image) {
            OpenGraph::addImage($image);
            Twitter::setImage($image);
        }
    }

    public function checkout($planId)
    {
        $plan = Plan::findOrFail($planId);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => $plan->name,
                    ],
                    'unit_amount' => $plan->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url("/checkout-success/{$plan->id}/{CHECKOUT_SESSION_ID}"),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }

    public function checkoutSuccess($planId, $session_id)
    {
       Stripe::setApiKey(env('STRIPE_SECRET'));
       $session = Session::retrieve($session_id);
       $customer = $session->customer_details;

          Subscription::create([
              'user_id' => auth()->id() ?? null,
              'plan_id' => $planId,
              'name' => $customer->name ?? null,
              'email' => $customer->email ?? null,
              'phone' => $customer->phone ?? null,
              'country' => $customer->address->country ?? null,
              'state' => $customer->address->state ?? null,
              'city' => $customer->address->city ?? null,
              'line1' => $customer->address->line1 ?? null,
              'line2' => $customer->address->line2 ?? null,
              'postal_code' => $customer->address->postal_code ?? null,
              'amount' => $session->amount_total / 100,
              'stripe_session_id' => $session->id,
              'payment_status' => $session->payment_status,
          ]);

        return redirect()->route('home')->with('subscription_success', true);
    }

    public function checkoutCancel()
    {
        return redirect()->route('home')->with('subscription_cancel', true);
    }

    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Your newsletter request has been sent. Thank you!')->withFragment('footer');
    }

    public function foodChoice()
    {
        $foodChoice = Master::firstOrCreate(['name' => 'foodChoice']);
        $banner = Banner::where('page', 'Food & Choice')->first();

        if($foodChoice){
            $this->seo(
                $foodChoice->meta_title,
                $foodChoice->meta_description,
                $foodChoice->meta_keywords,
                $foodChoice->meta_image ? asset('images/meta_image/' . $foodChoice->meta_image) : null
            );
        }
        $features = Cache::remember('active_features', now()->addDay(), function () {
            return Service::orderByRaw('sl = 0, sl ASC')->orderBy('id', 'desc')->where('type', 2)->where('status', 1)->get();
        });
      $company = CompanyDetails::select('address1', 'phone1', 'email1')->first();
      return view('frontend.foodChoice', compact('foodChoice', 'company', 'features','banner'));
    }

    public function fees()
    {
        $fees = Master::firstOrCreate(['name' => 'fees']);
        $banner = Banner::where('page', 'Fees')->first();

      if($fees){
          $this->seo(
              $fees->meta_title,
              $fees->meta_description,
              $fees->meta_keywords,
              $fees->meta_image ? asset('images/meta_image/' . $fees->meta_image) : null
          );
      }
      
      $company = CompanyDetails::select('address1', 'phone1', 'email1')->first();
      return view('frontend.fees', compact('fees', 'company', 'banner'));
    }



    public function aboutUs()
    {
        $about1 = Master::firstOrCreate(['name' => 'about1']);
        $galleries = Content::with('category')->where('type', 1)->latest()->get();
        $banner = Banner::where('page', 'About')->first();

      if($about1){
          $this->seo(
              $about1->meta_title,
              $about1->meta_description,
              $about1->meta_keywords,
              $about1->meta_image ? asset('images/meta_image/' . $about1->meta_image) : null
          );
      }
      
      $company = CompanyDetails::select('address1', 'phone1', 'email1')->first();
      return view('frontend.about', compact('about1', 'company','galleries','banner'));
    }

    public function agegroup($slug)
    {
        
        $agegroup = Content::with('category','images')->where('type', 3)->where('slug', $slug)->first();
        $banner = Banner::where('page', 'Age Group')->first();

      if($agegroup){
          $this->seo(
              $agegroup->meta_title,
              $agegroup->meta_description,
              $agegroup->meta_keywords,
              $agegroup->meta_image ? asset('images/meta_image/' . $agegroup->meta_image) : null
          );
      }
      
      $company = CompanyDetails::select('address1', 'phone1', 'email1')->first();
      return view('frontend.agegroup', compact('agegroup', 'company', 'banner'));
    }

    public function job()
    {
        $categories = JobList::whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category');

        $locations = JobList::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location');

        $jobMeta = Master::firstOrCreate(['name' => 'job']);

        $banner = Banner::where('page', 'Job')->first();
        if($jobMeta){
            $this->seo(
                $jobMeta->meta_title,
                $jobMeta->meta_description,
                $jobMeta->meta_keywords,
                $jobMeta->meta_image ? asset('images/meta_image/' . $jobMeta->meta_image) : null
            );
        }
      
        $company = CompanyDetails::select('address1', 'phone1', 'email1')->first();
        return view('frontend.job', compact('company', 'banner', 'categories', 'locations'));
    }

    public function filterJobs(Request $request)
    {
        $query = JobList::where('status', 1);

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->category && $request->category != 'All Job Categories') {
            $query->where('category', $request->category);
        }

        if ($request->location && $request->location != 'All Locations') {
            $query->where('location', $request->location);
        }

        $jobs = $query->latest()->get();

        $html = '';
        foreach ($jobs as $job) {
            $html .= '
            <a href="' . route('job.show', $job->slug) . '" class="job-item">
              <h4>' . e($job->title) . '</h4>
              <p class="mb-1 text-muted">Location: ' . e($job->location) . '</p>
              <span class="more">More Details →</span>
            </a>';
        }

        return response()->json(['html' => $html ?: '<p class="text-center">No jobs found.</p>']);
    }

    public function jobDetails($slug)
    {
        $banner = Banner::where('page', 'Job')->first();
        $job = JobList::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('frontend.job-detail', compact('job', 'banner'));
    }

    public function applyJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_id' => 'required|exists:job_lists,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'cover_letter' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()]);
        }

        $file = $request->file('resume');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/jobs'), $fileName);

        JobApplication::create([
            'job_id' => $request->job_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'cover_letter' => $request->cover_letter,
            'resume' => $fileName,
        ]);

        return response()->json(['status' => 200, 'message' => 'Application submitted successfully!']);
    }

    public function reference()
    {
        
        $job = Content::with('category','images')->where('type', 1)->first();
        if($job){
            $this->seo(
                $job->meta_title,
                $job->meta_description,
                $job->meta_keywords,
                $job->meta_image ? asset('images/meta_image/' . $job->meta_image) : null
            );
        }
      
        $company = CompanyDetails::select('address1', 'phone1', 'email1')->first();
        return view('frontend.reference', compact('job', 'company'));
    }

    public function referenceStore(Request $request)
    {
        $validated = $request->validate([
            'candidate_first' => 'required|string|max:255',
            'candidate_last' => 'required|string|max:255',
            'referee_first' => 'required|string|max:255',
            'referee_last' => 'required|string|max:255',
            'referee_email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'criteria' => 'required|string',
        ]);

        Log::info('Reference form data: ', $request->all());

        Reference::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Reference submitted successfully!'
        ]);
    }

}
