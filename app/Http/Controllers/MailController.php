<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
  public function ae(Request $request)
  {
    Mail::send('emails.ae-send', [
      'initials' => $request->inititals,
      'age' => $request->age,
      'weight' => $request->weight,
      'hight' => $request->hight,
      'event' => $request->event,
      'suspect' => $request->suspect,
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
    ], function ($message) {
      $message->to('drugsafety@evolet.co.uk');
      $message->subject('Сообщение о жалобе на продукт');
    });

    return back();
  }
}
