<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Document::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('document', function($row) {
                    if ($row->document) {
                        return '<div class="pdf-preview" style="display:flex;align-items:center;gap:8px;">
                                    <div style="width:120px;height:160px;border:1px solid #ddd;overflow:hidden;background:#f5f5f5;">
                                        <iframe src="'.asset("images/documents/".$row->document).'#toolbar=0&navpanes=0" style="width:100%;height:100%;border:none;"></iframe>
                                    </div>
                                    <div style="max-width:200px;">
                                        <div style="font-size:13px;font-weight:600;margin-bottom:6px;">'.htmlspecialchars($row->title ?? pathinfo($row->document, PATHINFO_FILENAME)).'</div>
                                        <a href="'.asset("images/documents/".$row->document).'" target="_blank" class="btn btn-sm btn-outline-primary">Open PDF</a>
                                    </div>
                                </div>';
                    }
                    return '';
                })
                ->addColumn('sl', function ($row) {
                    return $row->sl ?? '';
                })
                ->addColumn('status', function($row) {
                    $checked = $row->status == 1 ? 'checked' : '';
                    return '<div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="customSwitchStatus'.$row->id.'" data-id="'.$row->id.'" '.$checked.'>
                                <label class="custom-control-label" for="customSwitchStatus'.$row->id.'"></label>
                            </div>';
                })
                ->addColumn('action', function($row) {
                    return '
                      <button class="btn btn-sm btn-info edit" data-id="'.$row->id.'"><i class="fas fa-edit"></i></button>
                      <button class="btn btn-sm btn-danger delete" data-id="'.$row->id.'"><i class="fas fa-trash-alt"></i></button>
                    ';
                })
                ->rawColumns(['document', 'status', 'action'])
                ->make(true);
        }

        return view('admin.document.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf|max:5048',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = new Document();
        $data->title = $request->title;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->sl = $request->sl ?? 0;
        $data->created_by = auth()->id();

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/documents/');

            // Create folder if not exists
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $file->move($path, $filename);
            $data->document = $filename;
        }


        if ($data->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Client review created successfully.'
            ], 201);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Server error.'
            ], 500);
        }
    }

    public function edit($id)
    {
        $review = Document::find($id);
        if (!$review) {
            return response()->json([
                'status' => 404,
                'message' => 'Document not found'
            ], 404);
        }
        return response()->json($review);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf|max:5048',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }


        $data = Document::find($request->codeid);
        if (!$data) {
            return response()->json([
                'status' => 404,
                'message' => 'Document not found'
            ], 404);
        }

        $data->title = $request->title;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->sl = $request->sl ?? 0;
        $data->updated_by = auth()->id();

        if ($request->hasFile('document')) {
            // Delete old document if exists
            if ($data->document && file_exists(public_path('images/documents/' . $data->document))) {
                unlink(public_path('images/documents/' . $data->document));
            }
            $file = $request->file('document');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/documents/');

            // Create folder if not exists
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $file->move($path, $filename);
            $data->document = $filename;
        }

        if ($data->save()) {
            
            return response()->json([
                'status' => 200,
                'message' => 'Document updated successfully.'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Server error.'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $data = Document::find($id);
        
        if (!$data) {
            return response()->json(['success' => false, 'message' => 'Document not found.'], 404);
        }

        // Delete image if exists
        if ($data->document && file_exists(public_path('images/documents/' . $data->document))) {
            unlink(public_path('images/documents/' . $data->document));
        }

        if ($data->delete()) {
            
            return response()->json(['success' => true, 'message' => 'Data deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Failed to delete Document.'], 500);
    }

    public function toggleStatus(Request $request)
    {
        $review = Document::find($request->review_id);
        if (!$review) {
            return response()->json(['status' => 404, 'message' => 'Document not found']);
        }

        $review->status = $request->status;
        $review->save();
        return response()->json(['status' => 200, 'message' => 'Status updated successfully']);
    }
}
