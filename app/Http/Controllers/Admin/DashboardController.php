<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function dashboard()
    {
      return view('admin.home.dashboard');
    } 
    
    public function profile()
    {
      return view('admin.my.profile', [
        'user' => User::find(auth()->user()->id)
      ]);
    }
}