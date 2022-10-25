<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index()
    {
        $user=user::where('user_type','0')->get();
       return view ('Admin.userlist',compact('user'));
    }
    public function delete($id)
    {
        $user=user::where('id','=',$id)->delete();
        return redirect()->back()->with('status','recorded Deleted successfully');
    }
    public function edit($id)
    {
     
        $user=user::where('id','=',$id)->get();
        return view('Admin.useredit',compact('user'));
    }
    public function edituser(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->update();
        return redirect()->back()->with('status','recorded Update successfully');
    }
}
