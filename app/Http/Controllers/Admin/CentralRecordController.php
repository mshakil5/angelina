<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CentralRecord;
use App\Models\CompanyDetails;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class CentralRecordController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CentralRecord::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row) {
                    $checked = $row->application_pack_completed == 'Yes' ? 'checked' : '';
                    return '<div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="status'.$row->id.'" data-id="'.$row->id.'" '.$checked.'>
                                <label class="custom-control-label" for="status'.$row->id.'"></label>
                            </div>';
                })
                ->addColumn('action', function($row) {
                    return '
                    <a href="'.route('central-records.show', $row->id).'" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                    <button class="btn btn-sm btn-info edit" data-id="'.$row->id.'"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger delete" data-id="'.$row->id.'"><i class="fas fa-trash-alt"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.central-record.index');
    }

    public function show($id)
    {
        $record = CentralRecord::findOrFail($id);
        $company = CompanyDetails::first();
        return view('admin.central-record.show', compact('record', 'company'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()], 422);
        }

        $data = $request->except(['_token', 'codeid']);
        $data['application_pack_completed'] = $request->has('application_pack_completed') ? 'Yes' : 'No';
        $data['health_declaration_form_completed'] = $request->has('health_declaration_form_completed') ? 'Yes' : 'No';
        $data['qualifications_required'] = $request->has('qualifications_required') ? 'Yes' : 'No';
        $data['qualifications_evidenced'] = $request->has('qualifications_evidenced') ? 'Yes' : 'No';
        $data['counts_in_ratios'] = $request->has('counts_in_ratios') ? 'Yes' : 'No';
        $data['dbs_certificate_seen'] = $request->has('dbs_certificate_seen') ? 'Yes' : 'No';
        $data['reference_one_satisfactory'] = $request->has('reference_one_satisfactory') ? 'Yes' : 'No';
        $data['reference_two_satisfactory'] = $request->has('reference_two_satisfactory') ? 'Yes' : 'No';

        CentralRecord::create($data);

        return response()->json(['status' => 200, 'message' => 'Central Record created successfully.'], 201);
    }

    public function edit($id)
    {
        $record = CentralRecord::find($id);
        if (!$record) {
            return response()->json(['status' => 404, 'message' => 'Record not found'], 404);
        }
        return response()->json($record);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()], 422);
        }

        $record = CentralRecord::find($request->codeid);
        if (!$record) {
            return response()->json(['status' => 404, 'message' => 'Record not found'], 404);
        }

        $data = $request->except(['_token', 'codeid']);
        $data['application_pack_completed'] = $request->has('application_pack_completed') ? 'Yes' : 'No';
        $data['health_declaration_form_completed'] = $request->has('health_declaration_form_completed') ? 'Yes' : 'No';
        $data['qualifications_required'] = $request->has('qualifications_required') ? 'Yes' : 'No';
        $data['qualifications_evidenced'] = $request->has('qualifications_evidenced') ? 'Yes' : 'No';
        $data['counts_in_ratios'] = $request->has('counts_in_ratios') ? 'Yes' : 'No';
        $data['dbs_certificate_seen'] = $request->has('dbs_certificate_seen') ? 'Yes' : 'No';
        $data['reference_one_satisfactory'] = $request->has('reference_one_satisfactory') ? 'Yes' : 'No';
        $data['reference_two_satisfactory'] = $request->has('reference_two_satisfactory') ? 'Yes' : 'No';

        $record->update($data);

        return response()->json(['status' => 200, 'message' => 'Record updated successfully.'], 200);
    }

    public function destroy($id)
    {
        $record = CentralRecord::find($id);
        if (!$record) {
            return response()->json(['success' => false, 'message' => 'Record not found.'], 404);
        }
        $record->delete();
        return response()->json(['success' => true, 'message' => 'Record deleted successfully.']);
    }
}
