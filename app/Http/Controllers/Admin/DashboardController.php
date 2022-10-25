<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PDF_Draft;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user=user::where('user_type','0')->count();
        $PDF_Draft=PDF_Draft::count();
        return view('Admin.dashboard',compact('user','PDF_Draft'));
    }
    public function logout()
    {
        auth()->logout();
        Session::flush();
        return view('welcome');
    }
    public function logoutuser()
    {
        auth()->logout();
        Session::flush();
        return view('welcome');
    }
    public function welcome()
    {
        auth()->logout();
        Session::flush();
        return view('welcome');
    }

}
