<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Newslifestyle;
use App\Models\Nosology;
use App\Models\Product;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function products()
  {
    $data['products'] = Product::select('id', 'title', 'created_at')->orderBy('created_at', 'desc')->get();
    $data['nosology'] = Nosology::get();
    $data['classification'] = Classification::get();

    return view('dashboard.pages.products.index', compact('data'));
  }

  public function newslifestyle()
  {
    $data['newslifestyles'] = Newslifestyle::select('id', 'title', 'created_at')->orderBy('created_at', 'desc')->get();

    return view('dashboard.pages.newslifestyle.index', compact('data'));
  }

  public function carrier()
  {
    $data['vacancies'] = Vacancy::latest()->get();

    return view('dashboard.pages.carrier.index', compact('data'));
  }
}
