<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Newslifestyle;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class NewsLifestyleController extends Controller
{
  public function index()
  {
    $data = Helper::getContents('newslifestyle');
    $data['newslifestyles'] = Newslifestyle::paginate(6);

    return view('pages.newslifestyle.index', compact('data'));
  }

  public function show($slug)
  {
    $data = Helper::getContents('newslifestyle');
    $data['newslifestyle'] = Newslifestyle::where('slug', $slug)->first();
    $data['similars'] = Newslifestyle::latest()->get();

    return view('pages.newslifestyle.show', compact('data'));
  }
}
