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
                // Combine First and Last Name for the Candidate
                ->addColumn('candidate_name', function ($row) {
                    return $row->candidate_first . ' ' . $row->candidate_last;
                })
                // Combine First and Last Name for the Referee (THIS FIXES THE ERROR)
                ->addColumn('referee_name', function ($row) {
                    return $row->referee_first . ' ' . $row->referee_last;
                })
                ->addColumn('created_at', function ($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('d-m-Y');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('reference.show', $row->id) . '" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> View Report
                            </a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.references.index');
    }

    public function show($id)
    {
        $reference = Reference::findOrFail($id);
        $company = CompanyDetails::first();
        return view('admin.references.show', compact('reference', 'company'));
    }
}