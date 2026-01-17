<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDetails;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDocumentCompletion;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $documentsCount = Document::where('category', 'Employee Dashboard')->where('status', 1)->count();
            $users = User::withCount('documents')->where('is_type', 3)->latest()->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('commencement', function ($row) use ($documentsCount) {
                    $docsCount = $row->documents_count;
                    $percentage = $documentsCount > 0 ? ($docsCount / $documentsCount * 100) : 0;
                    return '<div class="text-center">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: ' . $percentage . '%;" aria-valuenow="' . $docsCount . '" aria-valuemin="0" aria-valuemax="' . $documentsCount . '">
                                        ' . $docsCount . '/' . $documentsCount . '
                                    </div>
                                </div>
                            </div>';
                })
                ->addColumn('status', function ($row) {
                    $checked = $row->status == 1 ? 'checked' : '';
                    return '<div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="customSwitchStatus' . $row->id . '" data-id="' . $row->id . '" ' . $checked . '>
                                <label class="custom-control-label" for="customSwitchStatus' . $row->id . '"></label>
                            </div>';
                })
                ->addColumn('action', function($row) {
                    $editBtn = '<button class="btn btn-sm btn-info edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger delete" data-id="' . $row->id . '"><i class="fas fa-trash-alt"></i></button>';
                    $viewBtn = '<a class="btn btn-sm btn-success" href="' . route('user.commencement', $row->id) . '"><i class="fas fa-eye"></i></a>';
                    return $editBtn . ' ' . $deleteBtn . ' ' . $viewBtn;
                })
                ->rawColumns(['commencement', 'status', 'action'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'emergency_name' => 'nullable|string',
            'emergency_email' => 'nullable|email|max:80',
            'emergency_phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->emergency_name = $request->emergency_name;
        $user->emergency_email = $request->emergency_email;
        $user->emergency_phone = $request->emergency_phone;

        $user->emergency_name2 = $request->emergency_name2;
        $user->emergency_email2 = $request->emergency_email2;
        $user->emergency_phone2 = $request->emergency_phone2;
        $user->password = Hash::make($request->password);
        $user->is_type = 3;
        $user->status = 1;
        $user->save();

        return response()->json(['status' => 200, 'message' => 'User created successfully', 'user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->emergency_name = $request->emergency_name;
        $user->emergency_email = $request->emergency_email;
        $user->emergency_phone = $request->emergency_phone;

        $user->emergency_name2 = $request->emergency_name2;
        $user->emergency_email2 = $request->emergency_email2;
        $user->emergency_phone2 = $request->emergency_phone2;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['status' => 200, 'message' => 'User deleted successfully']);
    }

    public function toggleStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();
        return response()->json(['status' => 200, 'message' => 'Status updated', 'new_status' => $user->status]);
    }

    public function commencement($id)
    {
        $employee = User::with('documents')->where('id', $id)->first();
        $company = CompanyDetails::firstOrCreate();
        return view('admin.users.commencement', compact('employee', 'company'));
    }


    public function admin(Request $request)
    {
        if ($request->ajax()) {
            $users = User::withCount('documents')->where('is_type', 1)->latest()->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $checked = $row->status == 1 ? 'checked' : '';
                    return '<div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="customSwitchStatus' . $row->id . '" data-id="' . $row->id . '" ' . $checked . '>
                                <label class="custom-control-label" for="customSwitchStatus' . $row->id . '"></label>
                            </div>';
                })
                ->addColumn('action', function($row) {
                    $editBtn = '<button class="btn btn-sm btn-info edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger delete" data-id="' . $row->id . '"><i class="fas fa-trash-alt"></i></button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.users.admin');
    }

    public function adminstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'emergency_name' => 'nullable|string',
            'emergency_email' => 'nullable|email|max:20',
            'emergency_phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->emergency_name = $request->emergency_name;
        $user->emergency_email = $request->emergency_email;
        $user->emergency_phone = $request->emergency_phone;
        $user->password = Hash::make($request->password);
        $user->is_type = 1;
        $user->status = 1;
        $user->save();

        return response()->json(['status' => 200, 'message' => 'User created successfully', 'user' => $user]);
    }






}