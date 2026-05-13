<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetails;
use App\Models\Content;
use App\Models\DbsForm;
use App\Http\Requests\StoreDbsFormRequest;
use SEOMeta;
use OpenGraph;
use Twitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DBSController extends Controller
{
    public function dbsForm()
    {
        $job = Content::with('category', 'images')->where('type', 1)->first();
        if ($job) {
            $this->seo(
                $job->meta_title,
                $job->meta_description,
                $job->meta_keywords,
                $job->meta_image ? asset('images/meta_image/' . $job->meta_image) : null
            );
        }

        $company = CompanyDetails::select('address1', 'phone1', 'email1')->first();
        return view('frontend.dbs', compact('job', 'company'));
    }

    public function dbsStore(StoreDbsFormRequest $request)
    {
        Log::info('DBS Form submission started', [
            'ip'    => $request->ip(),
            'email' => $request->declaration_email,
        ]);

        try {
            $docPaths = [];

            if ($request->hasFile('supporting_docs')) {
                Log::info('Files received', ['count' => count($request->file('supporting_docs'))]);

                foreach ($request->file('supporting_docs') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('dbs_documents', $filename, 'public');
                    $docPaths[] = [
                        'file'     => $filename,
                        'original' => $file->getClientOriginalName(),
                        'size'     => $file->getSize(),
                    ];
                    Log::info('File saved', ['file' => $filename]);
                }
            } else {
                Log::info('No files uploaded');
            }

            $dbs = DbsForm::create([
                'declaration_name'       => $request->declaration_name,
                'declaration_dob'        => $request->declaration_dob,
                'declaration_email'      => $request->declaration_email,
                'declaration_date'       => $request->declaration_date,
                'declaration_signature'  => $request->declaration_signature,
                'applicant_name'         => $request->applicant_name,
                'post_title'             => $request->post_title,
                'form_ref_number'        => $request->form_ref_number,
                'eligibility_ref'        => $request->eligibility_ref,
                'docs_group1'            => $request->docs_group1,
                'docs_group2a'           => $request->docs_group2a,
                'docs_group2b'           => $request->docs_group2b,
                'supporting_docs'        => $docPaths,
                'completed_by'           => $request->completed_by,
                'completion_date'        => $request->completion_date,
                'completion_signature'   => $request->completion_signature,
                'verified_by'            => $request->verified_by,
                'verification_date'      => $request->verification_date,
                'verification_signature' => $request->verification_signature,
                'accuracy_confirm'       => true,
                'ip_address'             => $request->ip(),
            ]);

            Log::info('DBS Form saved successfully', ['id' => $dbs->id]);

            return response()->json([
                'success'  => true,
                'redirect' => route('dbsForm') . '?success=1',
            ]);

        } catch (\Exception $e) {
            Log::error('DBS Form submission failed', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
            ], 500);
        }
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
}