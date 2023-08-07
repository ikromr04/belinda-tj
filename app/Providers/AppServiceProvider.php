<?php

namespace App\Providers;

use App\Helpers\Helper;
use App\Models\Newslifestyle;
use App\Models\Nosology;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Paginator::useBootstrap();

    view()->composer('*', function ($view) {

      $app['popular-products'] = Product::take(3)->get();
      $app['popular-categories'] = Nosology::take(5)->get();
      $app['newslifestyles'] = Newslifestyle::take(4)->get();

      return $view->with([
        'route' => \Route::currentRouteName(),
        'app' => $app
      ]);
    });
  }
}
