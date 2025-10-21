<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

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

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
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




}
