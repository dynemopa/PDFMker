<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $userid = Auth::user()->id;
        $all = user::find($userid);
     return view ('Admin.profile',compact('all'));
    }
    public function update(Request $request)
    {
        $user = Auth::user()->id;
        $all = User::find($user);

        $all->name = $request->name;
        $all->email =  $request->email;
        $all->save();
        return redirect()->back()->with('status','recorded Update successfully');
    }
    public function seepdf($id)
    {
        
        $all=user::with('PDF_Draft')->where('id','=',$id)->get();
        return view ('Admin.seepdf',compact('all'));;
    }
}
