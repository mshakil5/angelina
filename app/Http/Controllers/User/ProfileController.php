<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user();;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'about' => 'nullable|string|max:1000',
        ]);

        
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $imageName = mt_rand(10000000, 99999999) . '.webp';
            $destinationPath = public_path('images/profile/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            Image::make($uploadedFile)
                ->fit(400, 400, function ($constraint) {
                    $constraint->upsize();
                }, 'center')
                ->encode('webp', 80)
                ->save($destinationPath . $imageName);

            $user->feature_image = $imageName;
        }

        
        
        if ($request->hasFile('sign')) {
            $uploadedFile = $request->file('sign');
            $imageName = mt_rand(10000000, 99999999) . '.webp';
            $destinationPath = public_path('images/profile/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            Image::make($uploadedFile)
                ->encode('webp', 80)
                ->save($destinationPath . $imageName);

            $user->sign = $imageName;
        }


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->dob = $request->input('dob');
        $user->emergency_name = $request->input('emergency_name');
        $user->emergency_email = $request->input('emergency_email');
        $user->emergency_phone = $request->input('emergency_phone');
        $user->save();

        return response()->json(['message' => 'Profile updated successfully.']);
    }


    public function updatePassword(Request $request)
    {
        $user = Auth::user();;

        $request->validate([
            'currentPassword' => 'required|string|max:255',
            'newPassword' => 'required|string|max:255',
            'confirmPassword' => 'required|string|max:255|same:newPassword',
        ]);
        if (!Hash::check($request->input('currentPassword'), $user->password)) {
            return response()->json(['message' => 'Current password is incorrect.'], 422);
        }
        $user->password = Hash::make($request->input('newPassword'));
        $user->save();

        return response()->json(['message' => 'Profile updated successfully.']);
    }

    public function submitDocuments(Request $request)
    {
        $request->validate([
            'document_ids' => 'nullable|array',
            'document_ids.*' => 'integer|exists:documents,id',
        ]);

        $user = Auth::user();
        $newIds = $request->input('document_ids', []);

        // Get current saved document IDs for this user
        $existingIds = DB::table('user_document_completions')
            ->where('user_id', $user->id)
            ->pluck('document_id')
            ->toArray();

        // Find which documents to add or remove
        $toAdd = array_diff($newIds, $existingIds);
        $toRemove = array_diff($existingIds, $newIds);

        // Add newly checked documents
        foreach ($toAdd as $docId) {
            DB::table('user_document_completions')->updateOrInsert(
                ['user_id' => $user->id, 'document_id' => $docId],
                ['completed_at' => now()]
            );
        }

        // Remove unchecked documents
        if (!empty($toRemove)) {
            DB::table('user_document_completions')
                ->where('user_id', $user->id)
                ->whereIn('document_id', $toRemove)
                ->delete();
        }

        return response()->json([
            'message' => 'Documents updated successfully',
            'added' => $toAdd,
            'removed' => $toRemove
        ]);
    }





}
