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

use Yajra\DataTables\Facades\DataTables;

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

                $destinationPath = public_path('images/dbs');

                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                    Log::info('Created directory', ['path' => $destinationPath]);
                }

                foreach ($request->file('supporting_docs') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($destinationPath, $filename);
                    $docPaths[] = [
                        'file'     => $filename,
                        'original' => $file->getClientOriginalName(),
                        'size'     => $file->getSize(),
                    ];
                    Log::info('File saved', ['file' => $filename, 'path' => 'images/dbs/' . $filename]);
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


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $records = DbsForm::latest()->get();

            return DataTables::of($records)
                ->addIndexColumn()
                ->addColumn('applicant_name', function ($row) {
                    return $row->applicant_name;
                })
                ->addColumn('post_title', function ($row) {
                    return $row->post_title;
                })
                ->addColumn('created_at', function ($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('d-m-Y');
                })
                ->addColumn('docs_count', function ($row) {
                    $count = 0;
                    if ($row->docs_group1) $count += count($row->docs_group1);
                    if ($row->docs_group2a) $count += count($row->docs_group2a);
                    if ($row->docs_group2b) $count += count($row->docs_group2b);
                    $files = $row->supporting_docs ? count($row->supporting_docs) : 0;
                    return '<span class="badge bg-primary">' . $count . ' docs</span> <span class="badge bg-success">' . $files . ' files</span>';
                })
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('dbs.show', $row->id) . '" class="btn btn-sm btn-info" title="View"><i class="fas fa-eye"></i></a>
                        <a href="' . route('dbs.edit', $row->id) . '" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                    ';
                })
                ->rawColumns(['docs_count', 'action'])
                ->make(true);
        }
        return view('admin.dbs.index');
    }

    public function edit($id)
    {
        $dbs = DbsForm::findOrFail($id);
        return view('admin.dbs.edit', compact('dbs'));
    }

    public function update(Request $request, $id)
    {
        $dbs = DbsForm::findOrFail($id);

        $data = $request->validate([
            'declaration_name'       => 'required|string|max:255',
            'declaration_dob'        => 'required|date',
            'declaration_email'      => 'required|email|max:255',
            'declaration_date'       => 'required|date',
            'declaration_signature'  => 'required|string|max:255',
            'applicant_name'         => 'required|string|max:255',
            'post_title'             => 'required|string|max:255',
            'form_ref_number'        => 'nullable|string|max:100',
            'eligibility_ref'        => 'nullable|string|max:100',
            'docs_group1'            => 'required|array|min:1',
            'docs_group1.*'          => 'string|max:100',
            'docs_group2a'           => 'nullable|array',
            'docs_group2a.*'         => 'string|max:100',
            'docs_group2b'           => 'nullable|array',
            'docs_group2b.*'         => 'string|max:100',
            'supporting_docs'        => 'nullable|array',
            'supporting_docs.*'      => 'file|mimes:jpg,jpeg,png,pdf|max:5120',
            'completed_by'           => 'nullable|string|max:255',
            'completion_date'        => 'nullable|date',
            'completion_signature'   => 'nullable|string|max:255',
            'verified_by'            => 'nullable|string|max:255',
            'verification_date'      => 'nullable|date',
            'verification_signature' => 'nullable|string|max:255',
        ]);

        // Handle file removals
        $existingDocs = $dbs->supporting_docs ?? [];
        if ($request->filled('remove_files')) {
            $removeIndexes = array_map('intval', $request->remove_files);
            $existingDocs = array_values(array_filter($existingDocs, function($index) use ($removeIndexes) {
                return !in_array($index, $removeIndexes);
            }, ARRAY_FILTER_USE_KEY));
        }

        // Handle new file uploads
        if ($request->hasFile('supporting_docs')) {
            $destinationPath = public_path('images/dbs');
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            foreach ($request->file('supporting_docs') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $filename);
                $existingDocs[] = [
                    'file'     => $filename,
                    'original' => $file->getClientOriginalName(),
                    'size'     => $file->getSize(),
                ];
            }
        }

        $data['supporting_docs'] = $existingDocs;
        $dbs->update($data);

        return redirect()->route('dbs.index')->with('success', 'DBS form updated successfully.');
    }

    public function show($id)
    {
        $dbs = DbsForm::findOrFail($id);
        $company = CompanyDetails::first();
        return view('admin.dbs.show', compact('dbs', 'company'));
    }

    public function deleteFile(Request $request, $id)
    {
        $dbs = DbsForm::findOrFail($id);
        $index = intval($request->index);
        $docs = $dbs->supporting_docs ?? [];

        if (isset($docs[$index])) {
            $filepath = public_path('images/dbs/' . $docs[$index]['file']);
            if (file_exists($filepath)) {
                unlink($filepath);
            }
            array_splice($docs, $index, 1);
            $dbs->update(['supporting_docs' => $docs]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }








}