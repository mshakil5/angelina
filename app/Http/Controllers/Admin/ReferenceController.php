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
                ->addColumn('created_at', function ($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('d-m-y');
                })
                ->addColumn('action', function ($row) {
                    $viewBtn = '<a href="' . route('reference.show', $row->id) . '" class="btn btn-sm btn-success">
                                    <i class="fas fa-eye"></i>
                                </a>';
                    return $viewBtn;
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