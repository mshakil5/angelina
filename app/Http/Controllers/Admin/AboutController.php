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

    public function edit($id)
    {
        $content = About::findOrFail($id);
        return response()->json($content);
    }

    public function update(Request $request)
    {
        // 1. Validation
        $request->validate([
            'id' => 'required|exists:abouts,id',
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            $about = About::findOrFail($request->id);
            
            // 2. Update Text Fields
            $about->title = $request->title;
            $about->sub_title = $request->sub_title;
            $about->short_description = $request->short_description;
            $about->long_description = $request->long_description;
            $about->right_top = $request->right_top;
            $about->right_bottom = $request->right_bottom;
            
            // 3. Handle Dynamic Buttons (JSON)
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

            // 4. Handle Image Updates
            // Only replace the image if a new file is uploaded
            for ($i = 1; $i <= 3; $i++) {
                $imageKey = 'image' . $i;
                if ($request->hasFile($imageKey)) {
                    // Delete old file if it exists
                    if ($about->$imageKey && file_exists(public_path('images/about/' . $about->$imageKey))) {
                        unlink(public_path('images/about/' . $about->$imageKey));
                    }

                    $file = $request->file($imageKey);
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'about_' . $i . '_' . time() . '_' . rand(100, 999) . '.' . $extension;
                    $file->move(public_path('images/about'), $filename);
                    $about->$imageKey = $filename;
                }
            }

            $about->updated_by = auth()->id();
            $about->save();

            return response()->json(['status' => 200, 'message' => 'Content updated successfully!']);

        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'message' => $e->getMessage()], 500);
        }
    }


    public function toggleStatus(Request $request){
        $content = About::find($request->id);
        $content->status = $request->status;
        $content->save();
        return response()->json(['status'=>200,'message'=>'Status updated']);
    }
}
