<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = About::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $checked = $row->status ? 'checked' : '';
                    return '<div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="customSwitchStatus' . $row->id . '" data-id="' . $row->id . '" ' . $checked . '>
                                <label class="custom-control-label" for="customSwitchStatus' . $row->id . '"></label>
                            </div>';
                })
                ->addColumn('action', fn($row) => '<button class="btn btn-sm btn-info edit" data-id="'.$row->id.'"><i class="fas fa-edit"></i></button>')
                ->rawColumns(['status','action'])
                ->make(true);
        }

        return view('admin.about.index');
    }

    public function store(Request $request)
    {
        // 1. Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            $about = new About();
            $about->title = $request->title;
            $about->sub_title = $request->sub_title;
            $about->short_description = $request->short_description;
            $about->long_description = $request->long_description;
            $about->right_top = $request->right_top;
            $about->right_bottom = $request->right_bottom;
            
            // 2. Handle Dynamic Buttons (JSON)
            $buttons = [];
            if ($request->has('link')) {
                foreach ($request->link as $key => $link) {
                    if (!empty($link)) {
                        $buttons[] = [
                            'link' => $link,
                            'name' => $request->name[$key] ?? ''
                        ];
                    }
                }
            }
            $about->button = json_encode($buttons);

            // 3. Handle Image Uploads
            for ($i = 1; $i <= 3; $i++) {
                $imageKey = 'image' . $i;
                if ($request->hasFile($imageKey)) {
                    $file = $request->file($imageKey);
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'about_' . $i . '_' . time() . '_' . rand(100, 999) . '.' . $extension;
                    $file->move(public_path('images/about'), $filename);
                    $about->$imageKey = $filename;
                }
            }

            $about->created_by = auth()->id();
            $about->save();

            return response()->json(['status' => 200, 'message' => 'Content created successfully!']);

        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'message' => $e->getMessage()], 500);
        }
    }

    public function edit($type, $id)
    {
        $content = Content::with(['images', 'tags'])->findOrFail($id);
        return response()->json($content);
    }

    public function update(Request $request, $type)
    {
        $validator = Validator::make($request->all(), [
            'short_title' => [
                'required',
                'string',
                'max:255'
            ],
            'long_title' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'category_id' => 'required|exists:content_categories,id',
            'feature_image' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
            'meta_image' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        if ($validator->fails()){
            return response()->json(['status'=>422,'errors'=>$validator->errors()]);
        }

        $content = Content::with('images')->findOrFail($request->id);

        $content->category_id = $request->category_id;
        $content->short_title = $request->short_title;
        $content->long_title = $request->long_title;
        $content->publishing_date = $request->publishing_date;
        $content->short_description = $request->short_description;
        $content->long_description = $request->long_description;
        $content->slug = $type . '-' . Str::slug($request->short_title);
        $content->updated_by = auth()->id();
        $content->meta_title = $request->meta_title;
        $content->meta_description = $request->meta_description;
        $content->meta_keywords = $request->meta_keywords;

        $path = public_path('images/content/');

        // Feature image
        if ($request->hasFile('feature_image')) {
            if ($content->feature_image && file_exists($path . $content->feature_image)) {
                unlink($path . $content->feature_image);
            }
            $file = $request->file('feature_image');
            $filename = mt_rand(100000,999999) . '.webp';
            Image::make($file)
            ->fit(1000, 700)
            ->encode('webp', 70)
            ->save($path . $filename);
            $content->feature_image = $filename;
        }

        $content->save();


        return response()->json(['status'=>200,'message'=>'Content updated successfully']);
    }



    public function toggleStatus(Request $request){
        $content = About::find($request->id);
        $content->status = $request->status;
        $content->save();
        return response()->json(['status'=>200,'message'=>'Status updated']);
    }
}
