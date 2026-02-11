<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function showAdminProfile($locale)
    {
        app()->setLocale($locale);
        $admin = Auth::guard('admin')->user();

        return view('admin.profile', compact('admin'));
    }
}
