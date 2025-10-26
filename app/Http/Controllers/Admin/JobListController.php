<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobList;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Models\JobApplication;

class JobListController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JobList::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('title', fn($row) => $row->title ?? '')
                ->addColumn('category', fn($row) => $row->category ?? '')
                ->addColumn('location', fn($row) => $row->location ?? '')
                ->addColumn('status', function($row){
                    $checked = $row->status == 1 ? 'checked' : '';
                    return '<div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="jobListSwitch'.$row->id.'" data-id="'.$row->id.'" '.$checked.'>
                                <label class="custom-control-label" for="jobListSwitch'.$row->id.'"></label>
                            </div>';
                })
                ->addColumn('action', function($row){
                    return '<button class="btn btn-sm btn-info edit" data-id="'.$row->id.'"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger delete" data-id="'.$row->id.'"><i class="fas fa-trash-alt"></i></button>';
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }

        return view('admin.joblist.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:job_lists,title',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()], 422);
        }

        $job = new JobList();
        $job->fill($request->only(['title', 'description', 'category', 'location']));
        $job->slug = Str::slug($request->title);
        $job->created_by = auth()->id();
        $job->save();

        return response()->json(['status' => 200, 'message' => 'Job added successfully.'], 201);
    }

    public function edit($id)
    {
        return response()->json(JobList::find($id));
    }

    public function update(Request $request)
    {
        $job = JobList::find($request->codeid);
        if (!$job) {
            return response()->json(['status' => 404, 'message' => 'Not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:job_lists,title,' . $job->id,
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()], 422);
        }

        $job->fill($request->only(['title', 'description', 'category', 'location']));
        $job->slug = Str::slug($request->title);
        $job->updated_by = auth()->id();
        $job->save();

        return response()->json(['status' => 200, 'message' => 'Job updated successfully.'], 200);
    }

    public function destroy($id)
    {
        $job = JobList::find($id);
        if (!$job) return response()->json(['success'=>false,'message'=>'Not found.'],404);

        if ($job->delete()) {
            Cache::forget('active_joblists');
            return response()->json(['success'=>true,'message'=>'Deleted successfully.']);
        }
        return response()->json(['success'=>false,'message'=>'Failed to delete.'],500);
    }

    public function toggleStatus(Request $request)
    {
        $job = JobList::find($request->job_id);
        if (!$job) return response()->json(['status'=>404,'message'=>'Job not found']);

        $job->status = $request->status;
        $job->save();
        Cache::forget('active_joblists');

        return response()->json(['status'=>200,'message'=>'Status updated successfully']);
    }

    public function jobApplications(Request $request)
    {
        if ($request->ajax()) {
            $data = JobApplication::with('job')->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('job_title', fn($row) => $row->job->title ?? '')
                ->addColumn('full_name', fn($row) => $row->full_name)
                ->addColumn('email', fn($row) => $row->email)
                ->addColumn('phone', fn($row) => $row->phone)
                ->addColumn('resume', function($row){
                    if($row->resume){
                        $url = asset('images/jobs/'.$row->resume);
                        return '<a href="'.$url.'" target="_blank" class="btn btn-sm btn-primary">Download</a>';
                    }
                    return '-';
                })
                ->addColumn('applied_at', fn($row) => $row->created_at->format('d M, Y H:i'))
                ->rawColumns(['resume'])
                ->make(true);
        }

        return view('admin.joblist.applications');
    }

}