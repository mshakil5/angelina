<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    { 
        if (Auth::check()) {
            $user = auth()->user();

            if ($user->is_type == '1') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->is_type == '2') {
                return redirect()->route('manager.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->route('login');
        }
    }
    
    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function managerHome()
    {
        return view('home');
    }

    public function userHome()
    {
        $documents = \App\Models\Document::where('status', 1)->orderBy('sl', 'asc')->get();
        $groupedDocuments = $documents->groupBy('category');
        $userDocIds = \App\Models\UserDocumentCompletion::where('user_id', Auth::id())
            ->pluck('document_id')
            ->toArray();
        $banner = \App\Models\Banner::where('page', 'User Dashboard')->first();

        return view('user.dashboard', compact('groupedDocuments', 'userDocIds', 'banner'));
    }
}
