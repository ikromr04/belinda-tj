<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Site;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
  public function index()
  {
    $data = Helper::getContents('contacts');
    $data['sites'] = Site::get();

    return view('pages.contacts.index', compact('data'));
  }
}
