<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Banner;
use App\Models\Classification;
use App\Models\Content;
use App\Models\Newslifestyle;
use App\Models\Nosology;
use App\Models\Product;
use App\Models\ReleaseForm;
use App\Models\Text;
use App\Models\Vacancy;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index(Request $request)
  {
    switch ($request->action) {
      case 'toggle-state':
        session('dashboard') == 'shown'
          ? session()->put('dashboard', 'hidden')
          : session()->put('dashboard', 'shown');

        break;

      case 'toggle-mode':
        session('editMode')
          ? session()->put('editMode', false)
          : session()->put('editMode', true);

        return back();

      default:
        return redirect(route('home.index'));
    }
  }

  public function post(Request $request)
  {
    switch ($request->action) {
      case 'update-content':
        $content = Content::where('slug', $request->json('slug'))->first();
        $content->content = $request->json('content');
        $content->update();

        return json_encode($content);

      case 'update-text':
        $text = Text::where('slug', $request->json('slug'))->first();
        $text->text = $request->json('text');
        $text->update();

        return json_encode($text);
    }
  }

  public function banners(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $data['banner'] = null;

        return view('dashboard.pages.banners.show', compact('data'));

      case 'edit':
        $data['banner'] = Banner::find($request->banner);

        return view('dashboard.pages.banners.show', compact('data'));

      case 'delete':
        $banner = Banner::find($request->banner);
        $banner->img && file_exists('img/banners/' . $banner->img)
          ? unlink('img/banners/' . $banner->img)
          : '';
        $banner->delete();

        return back();

      default:
        $data['banners'] = Banner::get();

        return view('dashboard.pages.banners.index', compact('data'));
    }
  }

  public function bannersPost(Request $request)
  {
    switch ($request->action) {
      case 'store':
        $banner = new Banner();
        $file = $request->file('img');
        if ($file) {
          $fileName = uniqid() . '.' . $file->extension();
          $file->move(public_path('img/banners'), $fileName);
          Helper::resize_crop_image(1260, 428, public_path('img/banners/' . $fileName), public_path('img/banners/' . $fileName));
          $banner->img = $fileName;
        }
        $banner->link = $request->link;
        $banner->url = $request->url;
        $banner->save();

        return back()->with('success', 'Баннер успешно сохранен');

      case 'update':
        $banner = Banner::find($request->id);
        $file = $request->file('img');
        if ($file) {
          $banner->img && file_exists('img/banners/' . $banner->img)
            ? unlink('img/banners/' . $banner->img)
            : '';
          $fileName = uniqid() . '.' . $file->extension();
          $file->move(public_path('img/banners'), $fileName);
          Helper::resize_crop_image(1260, 428, public_path('img/banners/' . $fileName), public_path('img/banners/' . $fileName));
          $banner->img = $fileName;
        }
        $banner->link = $request->link;
        $banner->url = $request->url;
        $banner->update();

        return back()->with('success', 'Баннер успешно сохранен');
    }
  }

  public function products(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $data['product'] = null;
        $data['classifications'] = Classification::get();
        $data['nosologies'] = Nosology::get();
        $data['release_forms'] = ReleaseForm::get();

        return view('dashboard.pages.products.show', compact('data'));

      case 'edit':
        $product = Product::find($request->product);
        $data['product'] = $product;
        $data['classifications'] = Classification::get();
        $data['nosologies'] = Nosology::get();
        $data['release_forms'] = ReleaseForm::get();

        return view('dashboard.pages.products.show', compact('data'));

      case 'delete':
        $product = Product::find($request->product);
        $product->photo && file_exists('files/products/img/' . $product->photo)
          ? unlink('files/products/img/' . $product->photo)
          : '';
        $product->instruction && file_exists('files/products/instructions/' . $product->instruction)
          ? unlink('files/products/instructions/' . $product->instruction)
          : '';
        $product->delete();

        return back();

      default:
        $data['products'] = Product::latest()->get();

        return view('dashboard.pages.products.index', compact('data'));
    }
  }

  public function productsPost(Request $request)
  {
    $request->validate(['title' => 'required']);

    switch ($request->action) {
      case 'store':
        $product = new Product();
        $product->title = $request->title;

        $slug = SlugService::createSlug(Product::class, 'slug', $request->title);

        $product->slug = $slug;

        if ($request->file('photo')) {
          $file = $request->file('photo');
          $fileName = $slug . '.' . $file->extension();
          $file->move(public_path('files/products/img'), $fileName);
          // Helper::resize_crop_image(500, 500, public_path('files/products/img/' . $fileName), public_path('files/products/img/' . $fileName));
          // Helper::resize_crop_image(150, 150, public_path('files/products/img/' . $fileName), public_path('files/products/img/thumbs/' . $fileName));
          $product->photo = $fileName;
        }

        if ($request->file('instruction')) {
          $file = $request->file('instruction');
          $fileName = $slug . '.' . $file->extension();
          $file->move(public_path('files/products/instructions'), $fileName);
          $product->instruction = $fileName;
        }

        if ($request->classification) {
          $classification = new Classification();
          $classification->title = $request->classification;
          $classification->save();
          $product->classification_id  = $classification->id;
        }

        if ($request->nosology) {
          $nosology = new Nosology();
          $nosology->title = $request->nosology;
          $nosology->save();
          $product->nosology_id  = $nosology->id;
        }

        $request->classification_id && $product->classification_id = $request->classification_id;
        $request->nosology_id && $product->nosology_id = $request->nosology_id;

        $product->release_form_id = $request->release_form_id;
        $product->prescription = $request->prescription;
        $product->description = $request->description;
        $product->composition = $request->composition;
        $product->indications = $request->indications;
        $product->mode = $request->mode;
        $product->url = $request->url;
        $product->save();

        return back()->with('success', 'Данные успешно сохранены');

      case 'update':
        $product = Product::find($request->id);
        $product->title = $request->title;

        if ($request->file('photo')) {
          if ($product->photo && file_exists('files/products/img/' . $product->photo)) {
            unlink('files/products/img/' . $product->photo);
          }
          $file = $request->file('photo');
          $fileName = $product->slug . '.' . $file->extension();
          $file->move(public_path('files/products/img'), $fileName);
          // Helper::resize_crop_image(500, 500, public_path('files/products/img/' . $fileName), public_path('files/products/img/' . $fileName));
          // Helper::resize_crop_image(150, 150, public_path('files/products/img/' . $fileName), public_path('files/products/img/thumbs/' . $fileName));
          $product->photo = $fileName;
        }

        if ($request->file('instruction')) {
          if ($product->instruction && file_exists('files/products/instructions/' . $product->instruction)) {
            unlink('files/products/instructions/' . $product->instruction);
          }
          $file = $request->file('instruction');
          $fileName = $product->slug . '.' . $file->extension();
          $file->move(public_path('files/products/instructions'), $fileName);
          $product->instruction = $fileName;
        }

        if ($request->classification) {
          $classification = new Classification();
          $classification->title = $request->classification;
          $classification->save();
          $product->classification_id  = $classification->id;
        }

        if ($request->nosology) {
          $nosology = new Nosology();
          $nosology->title = $request->nosology;
          $nosology->save();
          $product->nosology_id  = $nosology->id;
        }

        $request->classification_id && $product->classification_id = $request->classification_id;
        $request->nosology_id && $product->nosology_id = $request->nosology_id;

        $product->release_form_id = $request->release_form_id;
        $product->prescription = $request->prescription;
        $product->description = $request->description;
        $product->composition = $request->composition;
        $product->indications = $request->indications;
        $product->mode = $request->mode;
        $product->url = $request->url;
        $product->update();

        return back()->with('success', 'Данные успешно сохранены');
    }
  }

  public function newslifestyles(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $data['newslifestyle'] = null;

        return view('dashboard.pages.newslifestyles.show', compact('data'));

      case 'edit':
        $data['newslifestyle'] = Newslifestyle::find($request->newslifestyle);

        return view('dashboard.pages.newslifestyles.show', compact('data'));

      case 'delete':
        $newslifestyle = Newslifestyle::find($request->newslifestyle);
        $newslifestyle->img && file_exists('files/newslifestyles/' . $newslifestyle->img)
          ? unlink('files/newslifestyles/' . $newslifestyle->img)
          : '';

        $newslifestyle->delete();

        return back();

      default:
        $data['newslifestyles'] = Newslifestyle::latest()->get();

        return view('dashboard.pages.newslifestyles.index', compact('data'));
    }
  }

  public function newslifestylesPost(Request $request)
  {
    $request->validate(['title' => 'required']);

    switch ($request->action) {
      case 'store':
        $newslifestyle = new Newslifestyle();
        $newslifestyle->title = $request->title;

        $slug = SlugService::createSlug(Newslifestyle::class, 'slug', $request->title);

        $newslifestyle->slug = $slug;

        if ($request->file('img')) {
          $file = $request->file('img');
          $fileName = $slug . '.' . $file->extension();
          $file->move(public_path('files/newslifestyles'), $fileName);
          // Helper::resize_crop_image(500, 500, public_path('files/products/img/' . $fileName), public_path('files/products/img/' . $fileName));
          // Helper::resize_crop_image(150, 150, public_path('files/products/img/' . $fileName), public_path('files/products/img/thumbs/' . $fileName));
          $newslifestyle->img = $fileName;
        }

        $newslifestyle->description = $request->description;
        $newslifestyle->save();

        return back()->with('success', 'Данные успешно сохранены');

      case 'update':
        $newslifestyle = Newslifestyle::find($request->id);
        $newslifestyle->title = $request->title;

        if ($request->file('img')) {
          if ($newslifestyle->img && file_exists('files/newslifestyles/' . $newslifestyle->img)) {
            unlink('files/newslifestyles/' . $newslifestyle->img);
          }
          $file = $request->file('img');
          $fileName = $newslifestyle->slug . '.' . $file->extension();
          $file->move(public_path('files/newslifestyles'), $fileName);
          // Helper::resize_crop_image(500, 500, public_path('files/products/img/' . $fileName), public_path('files/products/img/' . $fileName));
          // Helper::resize_crop_image(150, 150, public_path('files/products/img/' . $fileName), public_path('files/products/img/thumbs/' . $fileName));
          $newslifestyle->img = $fileName;
        }

        $newslifestyle->description = $request->description;
        $newslifestyle->update();

        return back()->with('success', 'Данные успешно сохранены');
    }
  }

  public function vacancies(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $data['vacancy'] = null;

        return view('dashboard.pages.vacancies.show', compact('data'));

      case 'edit':
        $data['vacancy'] = Vacancy::find($request->vacancy);

        return view('dashboard.pages.vacancies.show', compact('data'));

      case 'delete':
        $vacancy = Vacancy::find($request->vacancy);
        $vacancy->delete();

        return back();

      default:
        $data['vacancies'] = Vacancy::latest()->get();

        return view('dashboard.pages.vacancies.index', compact('data'));
    }
  }

  public function vacanciesPost(Request $request)
  {
    $request->validate(['title' => 'required']);

    switch ($request->action) {
      case 'store':
        $vacancy = new Vacancy();
        $vacancy->title = $request->title;
        $vacancy->description = $request->description;
        $vacancy->save();

        return back()->with('success', 'Данные успешно сохранены');

      case 'update':
        $vacancy = Vacancy::find($request->id);
        $vacancy->title = $request->title;
        $vacancy->description = $request->description;
        $vacancy->update();

        return back()->with('success', 'Данные успешно сохранены');
    }
  }
}
