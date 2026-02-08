<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Reference;
use App\Models\CompanyDetails;

class ReferenceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $references = Reference::latest()->get();

            return DataTables::of($references)
                ->addIndexColumn()
                ->addColumn('candidate_name', function ($row) {
                    return $row->candidate_first . ' ' . $row->candidate_last;
                })
                ->addColumn('referee_name', function ($row) {
                    return $row->referee_first . ' ' . $row->referee_last;
                })
                ->addColumn('created_at', function ($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('d-m-Y');
                })
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('reference.show', $row->id) . '" class="btn btn-sm btn-info" title="View"><i class="fas fa-eye"></i></a>
                        <a href="' . route('reference.edit', $row->id) . '" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.references.index');
    }

    public function edit($id)
    {
        $reference = Reference::findOrFail($id);
        return view('admin.references.edit', compact('reference'));
    }

    public function update(Request $request, $id)
    {
        $reference = Reference::findOrFail($id);
        
        // Validate based on your form fields
        $data = $request->validate([
            'candidate_first' => 'required|string|max:255',
            'candidate_last' => 'required|string|max:255',
            'referee_first' => 'required|string|max:255',
            'referee_last' => 'required|string|max:255',
            'referee_email' => 'required|email',
            // Add other validations as per your requirements
        ]);

        // Update all fields from request
        $reference->update($request->all());

        return redirect()->route('reference.index')->with('success', 'Reference updated successfully.');
    }

    public function show($id)
    {
        $reference = Reference::findOrFail($id);
        $company = CompanyDetails::first();
        return view('admin.references.show', compact('reference', 'company'));
    }
}