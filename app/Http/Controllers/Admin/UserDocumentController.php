<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDocumentController extends Controller
{
    public function index(int $id)
    {
        $employee  = User::findOrFail($id);
        $documents = EmployeeDocument::where('user_id', $id)->latest()->get();
        $types     = EmployeeDocument::$types;

        return view('admin.users.document', compact('employee', 'documents', 'types'));
    }

    public function store(Request $request, int $id)
    {
        $request->validate([
            'document_type' => 'required|in:' . implode(',', array_keys(EmployeeDocument::$types)),
            'file'          => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240',
            'notes'         => 'nullable|string|max:500',
        ]);

        $user = User::findOrFail($id);
        $file = $request->file('file');

        // Store into public/images/employe_document/{user_id}/
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path("images/employe_document/{$user->id}"), $filename);

        EmployeeDocument::create([
            'user_id'       => $user->id,
            'document_type' => $request->document_type,
            'file_path'     => "images/employe_document/{$user->id}/{$filename}",
            'original_name' => $file->getClientOriginalName(),
            'notes'         => $request->notes,
        ]);

        return redirect()->route('user.document.index', $id)
                         ->with('success', 'Document uploaded successfully.');
    }

    public function download(EmployeeDocument $doc)
    {
        $fullPath = public_path($doc->file_path);

        abort_unless(file_exists($fullPath), 404);

        return response()->download($fullPath, $doc->original_name);
    }

    public function destroy(EmployeeDocument $doc)
    {
        $userId   = $doc->user_id;
        $fullPath = public_path($doc->file_path);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }

        $doc->delete();

        return redirect()->route('user.document.index', $userId)
                         ->with('success', 'Document deleted.');
    }
}