<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDF_Draft;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Pdf_viewController extends Controller
{
  public function index()
  {
    $user_id = Auth::user()->id;
    $PDF_Draft=PDF_Draft::with( ['user'])->wherehas('user',function ($query) use ($user_id )
           {
            $query->where('user_id','=',$user_id);
           })->get();
   return view('user.viewpdf',compact('PDF_Draft'));
  }
  public function showpdf($id)
  {
    $value=PDF_Draft::find($id);
    $date = date('m-d-y');
    // return view ('user.showpdf',compact('value','date'));
 

    $pdf = PDF::loadView('user.showpdf',compact('value','date'));
    return $pdf->stream();

  }
  public function deletepdf($id)
  {
    $PDF_Draft=PDF_Draft::where('id','=',$id)->delete();
    return redirect()->back()->with('status','recorded Delete successfully');
  }
  public function editpdf($id)
  {
    $PDF_Draft=PDF_Draft::where('id','=',$id)->get();
    return view('user.editview',compact('PDF_Draft'));
  }
  public function updatepdf(Request $request, $id)
  {

    $PDF_Draft=PDF_Draft::find($id);
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
    $PDF_Draft->update();
    return redirect()->back()->with("success", "PDF successfully Updated !!");
  }
  public function download($id)
  {
    $value=PDF_Draft::find($id);
    $date = date('m-d-y');
    $pdf = PDF::loadView('user.showpdf',compact('value','date'));
    $success= $pdf->download($value->title.'mypdf.pdf');
    return Redirect::back()->with("status", "PDF Download successfully !!")->with([$success]);
  }
}
