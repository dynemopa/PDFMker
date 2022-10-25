<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDF_Draft;
use Illuminate\Support\Facades\Auth;



class GenerateController extends Controller
{
  public function index()
  {
    
    return view('user.generate');
  }
  public function make(Request $request)
  {
  //   $request->validate( [
  //     'title' => 'required',
  //     'titlepageimage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //     'summarycontent'=>'required|max:2000|min:10',
  //     'totelrain'=>'required|numeric|between:1,100',
  //     'totelmud'=>'required',
  //     'progressphoto'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //     'progressphototwo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //     'progressphotothree'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //     'twoweekcontent'=>'required',
  //     'safetytopic'=>'required',
  //     'safetyimage'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //     'pembroofing'=>'required|numeric|between:1,100',
  //     'frameexteriorwalls'=>'required|numeric|between:1,100',
  //     'sheathwalls'=>'required|numeric|between:1,100',
  //     'sidinginstall'=>'required|numeric|between:1,100',
  //     'windows'=>'required|numeric|between:1,100',
  //     'exteriordoorinstal'=>'required|numeric|between:1,100',
  //     'lightingfixtures'=>'required|numeric|between:1,100',
  //     'paving'=>'required|numeric|between:1,100',
  //     'backfillbehindcurbs'=>'required|numeric|between:1,100',
  //     'Pavers'=>'required|numeric|between:1,100',
  //     'tasks_issue'=>'required',
  //     'resolution'=>'required',
  // ]);

    $PDF_Draft = new PDF_Draft();
    $user_id = Auth::user()->id;
    $PDF_Draft->user_id= $user_id;
    $PDF_Draft->title = $request->title;
    if ($request->hasfile('titlepageimage')) {
      $PDF_Draft1 = $request->file('titlepageimage');
      $extention = $PDF_Draft1->getClientOriginalExtension();
      $filename = 't' . time() . '.' . $extention;
      $PDF_Draft1->move('uploads/image/', $filename);
    }

    $PDF_Draft->titlepageimage = $filename;
    $PDF_Draft->summarycontent = $request->summarycontent;
    $PDF_Draft->totelrain = $request->totelrain;
    $PDF_Draft->totelmud = $request->totelmud;
    if ($request->hasfile('progressphoto')) {
      $PDF_Draft2 = $request->file('progressphoto');
      $extention1 = $PDF_Draft2->getClientOriginalExtension();
      $filename1 = 'p1' . time() . '.' . $extention1;
      $PDF_Draft2->move('uploads/image/', $filename1);
    }
    $PDF_Draft->progressphoto = $filename1;
    if ($request->hasfile('progressphototwo')) {
      $PDF_Draft3 = $request->file('progressphototwo');
      $extention2 = $PDF_Draft3->getClientOriginalExtension();
      $filename2 = 'p2' . time() . '.' . $extention2;
      $PDF_Draft3->move('uploads/image/', $filename2);
    }
    $PDF_Draft->progressphototwo = $filename2;
    if ($request->hasfile('progressphotothree')) {
      $PDF_Draft4 = $request->file('progressphotothree');
      $extention3 = $PDF_Draft4->getClientOriginalExtension();
      $filename3 = 'p3' . time() . '.' . $extention3;
      $PDF_Draft4->move('uploads/image/', $filename3);
    }
    $PDF_Draft->progressphotothree = $filename3;
    $PDF_Draft->twoweekcontent = $request->twoweekcontent;
    $PDF_Draft->safetytopic = $request->safetytopic;
    if ($request->hasfile('safetyimage')) {
      $PDF_Draft5 = $request->file('safetyimage');
      $extention4 = $PDF_Draft5->getClientOriginalExtension();
      $filename4 = 'safetyimage' . time() . '.' . $extention4;
      $PDF_Draft5->move('uploads/image/', $filename4);
    }
    $PDF_Draft->safetyimage = $filename4;
    $PDF_Draft->pembroofing = $request->pembroofing;
    $PDF_Draft->frameexteriorwalls = $request->frameexteriorwalls;
    $PDF_Draft->sheathwalls = $request->sheathwalls;
    $PDF_Draft->sidinginstall = $request->sidinginstall;
    $PDF_Draft->windows = $request->windows;
    $PDF_Draft->exteriordoorinstal = $request->exteriordoorinstal;
    $PDF_Draft->lightingfixtures = $request->lightingfixtures;
    $PDF_Draft->paving = $request->paving;
    $PDF_Draft->backfillbehindcurbs = $request->backfillbehindcurbs;
    $PDF_Draft->Pavers = $request->Pavers;
    $PDF_Draft->tasks_issue = $request->tasks_issue;
    $PDF_Draft->save();
    return redirect()->back()->with("success", "PDF successfully Generated !!");
  }
}
