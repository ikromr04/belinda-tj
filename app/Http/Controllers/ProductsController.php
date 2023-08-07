<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Classification;
use App\Models\Nosology;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
  public function index(Request $request)
  {
    if ($request->agreement == 'agree') {
      session()->put('aware', 'awared');
    }

    if (!session()->has('aware')) {
      return redirect(route('products.attention'));
    }

    $data = Helper::getContents('products');
    $data['classifications'] = Classification::get();
    $data['nosologies'] = Nosology::get();
    $data['products'] = Product::orderBy('title', 'asc')->paginate(16);

    return view('pages.products.index', compact('data'));
  }

  public function filter(Request $request)
  {
    $classification = $request->json('classification');
    $nosology = $request->json('nosology');
    $prescription = $request->json('prescription');
    $keyword = $request->json('keyword');

    $products = Product::orderBy('title');

    if ($keyword) {
      $products->where('title', 'like', '%' . $keyword . '%');
    }
    if ($classification) {
      $products->where('classification_id', $classification);
    }
    if ($nosology) {
      $products->where('nosology_id', $nosology);
    }
    if ($prescription) {
      $products->where('prescription', $prescription);
    }

    $products = $products->paginate(16);

    $response = [
      'template' => view('pages.products.data', compact('products'))->render(),
    ];

    return json_encode($response);
  }

  public function show(Request $request)
  {
    $data = Helper::getContents('products');
    $data['product'] = Product::where('slug', $request->slug)->first();
    
    if ($request->agreement == 'agree') {
      session()->put('aware', 'awared');
    }
    if (!session()->has('aware') && $data['product']->prescription == 'RX') {
      return redirect(route('products.attention') . '?slug=' . $request->slug);
    }  

    $data['similar-products'] = Product::where('nosology_id', $data['product']->nosology_id)
      ->orWhere('classification_id', $data['product']->classification_id)
      ->get();

    $data['popular-products'] = Product::latest()->take(9)->get();

    return view('pages.products.show', compact('data'));
  }

  public function downloadInstruction(Request $request)
  {
    $product = Product::where('slug', $request->slug)->first();

    if (!$product->filename) {
      return back();
    }
    $file = public_path('files/products/instructions/' . $product->filename);

    $extension = pathinfo($file, PATHINFO_EXTENSION);

    $headers = array(
      'Content-Type: application/' . $extension,
    );

    return response()->download($file, $product->filename, $headers);
  }

  public function attention(Request $request)
  {
    $slug = $request->slug;

    return view('pages.products.attention', compact('slug'));
  }
}
