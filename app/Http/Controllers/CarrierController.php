<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Mail\ApplicationMail;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CarrierController extends Controller
{
  public function index()
  {
    $data = Helper::getContents('carrier');
    $data['vacancies'] = Vacancy::latest()->get();

    return view('pages.carrier.index', compact('data'));
  }

  public function apply($id)
  {
    $vacancy = Vacancy::find($id);

    return view('pages.carrier.apply', compact('vacancy'));
  }

  public function insertApplication(Request $request)
  {
    $details = [
      'vacancy' => $request->vacancy,
      'name' => $request->name,
      'email' => $request->email,
      'tel' => $request->tel,
      'message' => $request->message,
    ];

    $file = $request->file('cv');

    Mail::to('info@belinda.tj')->send(new ApplicationMail($details, $file));

    return back();
  }
}
