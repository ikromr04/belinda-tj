<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrierController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsLifestyleController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', [HomeController::class, 'search']);

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::post('/ae', [MailController::class, 'ae'])->name('ae');

Route::get('/product', [ProductsController::class, 'index'])->name('products.index');
Route::post('/product/filter', [ProductsController::class, 'filter'])->name('products.filter');
Route::get('/product/attention{product?}', [ProductsController::class, 'attention'])->name('products.attention');
Route::get('/product/download_instruction', [ProductsController::class, 'downloadInstruction'])->name('products.download_instruction');
Route::get('/product/{slug}', [ProductsController::class, 'show'])->name('products.show');

Route::get('/carrier', [CarrierController::class, 'index'])->name('carrier.index');
Route::get('/carrier/apply/{id}', [CarrierController::class, 'apply'])->name('carrier.apply');
Route::post('/apply', [CarrierController::class, 'insertApplication'])->name('apply');

Route::get('/newslifestyle', [NewsLifestyleController::class, 'index'])->name('newslifestyle.index');
Route::get('/newslifestyle/news', [NewsLifestyleController::class, 'news'])->name('newslifestyle.news');
Route::get('/newslifestyle/lifestyle', [NewsLifestyleController::class, 'lifestyle'])->name('newslifestyle.lifestyle');
Route::get('/newslifestyle/{slug}', [NewsLifestyleController::class, 'show'])->name('newslifestyle.show');

Route::get('/contact/', [ContactsController::class, 'index'])->name('contacts.index');

// Auth routes
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
  Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');

  Route::group(['middleware' => ['AdminCheck']], function () {
    Route::get('/admin/{action?}', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/{action?}', [AdminController::class, 'post']);

    Route::get('/banners/{action?}/{banner?}', [AdminController::class, 'banners'])->name('banners');
    Route::post('/banners/{ation?}', [AdminController::class, 'bannersPost'])->name('banners.post');

    Route::get('/admin-products/{action?}/{product?}', [AdminController::class, 'products'])->name('admin.products');
    Route::post('/admin-products/{action?}/', [AdminController::class, 'productsPost'])->name('admin.products.post');

    Route::get('/admin-newslifestyles/{action?}/{newslifestyle?}', [AdminController::class, 'newslifestyles'])->name('admin.newslifestyles');
    Route::post('/admin-newslifestyles/{action?}/', [AdminController::class, 'newslifestylesPost'])->name('admin.newslifestyles.post');

    Route::get('/admin-vacancies/{action?}/{vacancy?}', [AdminController::class, 'vacancies'])->name('admin.vacancies');
    Route::post('/admin-vacancies/{action?}/', [AdminController::class, 'vacanciesPost'])->name('admin.vacancies.post');
  });
});

Route::redirect('/products/', '/product');
Route::redirect('/about-us/', '/about');
Route::redirect('/career/', '/carrier');
Route::redirect('/contacts/', '/contact');
Route::redirect('/nosology/{path}', '/product');
Route::redirect('/vitaminy/', '/product');
Route::redirect('//polza-zhirnyh-kislot-omega-3-dlja-zdorovja/', '/newslifestyle/polza-zhirnyh-kislot-omega-3-dlya-zdorovya');
Route::redirect('/avitaminoz-i-gipovitaminoz/', '/newslifestyle/avitaminoz-i-gipovitaminoz');
Route::redirect('/poleznye-svojstva-vitamina-a/', '/newslifestyle/poleznye-svoystva-vitamina-a');

Route::redirect('/chem-zhenskij-mozg-otlichaetsja-ot-muzhskogo-5-interesnyh-faktov/', '/newslifestyle/chem-zhenskiy-mozg-otlichaetsya-ot-muzhskogo-5-interesnyh-faktov');
Route::redirect('/useful-articles/', '/newslifestyle');
Route::redirect('/drug-selection/', '/product');
Route::redirect('/avtoreks-a/', '/product/avtoreks-a');
Route::redirect('/avtoreks/', '/product/avtoreks-a');
Route::redirect('/nosology/', '/product');
Route::redirect('/ajdip/', '/product/aydip');
Route::redirect('/albalens/', '/product/albalens');
Route::redirect('/ambaksin-2/', '/product/ambaksin');
Route::redirect('/amlizekt/', '/product/amlizekt');
Route::redirect('/amokvart/', '/product/amokvart-inekciya');
Route::redirect('/amokvart-2/', '/product/amokvart-suspenziya');
Route::redirect('/asnomit/', '/product/asnomit');
Route::redirect('/acemagnil/', '/product/acemagnil');
Route::redirect('/belazidim/', '/product/belazidim');
Route::redirect('/belamicin/', '/product/belamicin');
Route::redirect('/belandzh/', '/product/belandzh');
Route::redirect('/belacef/', '/product/belacef');
Route::redirect('/belibakt/', '/product/belibakt');
Route::redirect('/belkarnitin/', '/product/belkarnitin-ampuly');
Route::redirect('/belkarnitin-2/', '/product/belkarnitin-rastvor');
Route::redirect('/viplaktin-bejbi/', '/product/viplaktin-beybi');
Route::redirect('/viplaktin/', '/product/viplaktin-amino');
Route::redirect('/gvardens/', '/product/gvardens');
Route::redirect('/geksabel/', '/product/geksabel');
Route::redirect('/gelocer-mv/', '/product/gelocer');
Route::redirect('/gricen/', '/product/gricen');
Route::redirect('/dejstrek/', '/product/deystrek');
Route::redirect('/dejateks-gel/', '/product/deystrek');
Route::redirect('/dianejro/', '/product/dianeyro');
Route::redirect('/doksilakt/', '/product/doksilakt');
Route::redirect('/dramatek-s/', '/product/dramatek-suspenziya');
Route::redirect('/dramatek/', '/product/dramatek-tabletki');
Route::redirect('/duotripsin/', '/product/duotripsin');
Route::redirect('/ibulajt-gel/', '/product/ibulayt-gel');
Route::redirect('/ibulajt-suspenzija/', '/product/ibulayt-suspenziya');
Route::redirect('/ibulajt/', '/product/ibulayt-gel');
Route::redirect('/immubels/', '/product/immubels');
Route::redirect('/jodovin/', '/product/yodovin');
Route::redirect('/kategor/', '/product/kategor');
Route::redirect('/kategor-2/', '/product/kategor');
Route::redirect('/ko-bagroven/', '/product/ko-bagroven');
Route::redirect('/komnevrol/', '/product/komnevrol-aktiv-tabletki');
Route::redirect('/komnevrol-2/', '/product/komnevrol-ampuly');
Route::redirect('/kredavejt/', '/product/kredaveyt');
Route::redirect('/lambrotin-sirop/', '/product/lambrotin-sirop');
Route::redirect('/lambrotin/', '/product/lambrotin');
Route::redirect('/linda-d3/', '/product/lindavit-d3-kapsuly');
Route::redirect('/lindavit-dlja-muzhchin/', '/product/lindavit-dlya-muzhchin');
Route::redirect('/lindavit-kardio/', '/product/lindavit-kardio');
Route::redirect('/lindavit-omega-3/', '/product/lindavit-omega-3');
Route::redirect('/lindavit-pregna/', '/product/lindavit-pregna');
Route::redirect('/lindavit/', '/product/lindavit-s');
Route::redirect('/lindae/', '/product/linda-e400');
Route::redirect('/lindakalc-aktiv/', '/product/lindakalc-aktiv-tabletki');
Route::redirect('/lindakalc/', '/product/lindakalc-sirop');
Route::redirect('/lindafer/', '/product/lindafer');
Route::redirect('/lindafer-2/', '/product/lindafer');
Route::redirect('/lindacink/', '/product/lindacink');
Route::redirect('/lindesan/', '/product/lindesan');
Route::redirect('/memibel-l/', '/product/memibel-l');
Route::redirect('/meridon/', '/product/meridon-suspenziya');
Route::redirect('/meridon-2/', '/product/meridon-tabletki');
Route::redirect('/meritro/', '/product/meritro');
Route::redirect('/metfialk/', '/product/metfialk');
Route::redirect('/mikonet/', '/product/mikonet');
Route::redirect('/monteliz/', '/product/monteliz-suspenziya');
Route::redirect('/nasladiks/', '/product/nasladiks');
Route::redirect('/novospaz/', '/product/novospaz');
Route::redirect('/normdzhigar/', '/product/normdzhigar');
Route::redirect('/pinogal/', '/product/pinogal');
Route::redirect('/priklader/', '/product/priklader');
Route::redirect('/rivalekt/', '/product/rivalekt-ampuly');
Route::redirect('/rivalekt-2/', '/product/rivalekt-gel');
Route::redirect('/riglodem/', '/product/riglodem');
Route::redirect('/rodiloza/', '/product/rodiloza');
Route::redirect('/sedalajt-bejbi/', '/product/sedalayt-beybi');
Route::redirect('/sedalajt/', '/product/sedalayt-tabletki');
Route::redirect('/separd/', '/product/separd');
Route::redirect('/stofeksim/', '/product/stofeksim-suspenziya');
Route::redirect('/stofeksim-2/', '/product/stofeksim-tabletki');
Route::redirect('/tavestin/', '/product/tavestin-ampuly');
Route::redirect('/tades/', '/product/tades-sirop');
Route::redirect('/tades-2/', '/product/tades-tabletki');
Route::redirect('/tadreta/', '/product/tadreta');
Route::redirect('/tvaksipim/', '/product/tvaksipim');
Route::redirect('/torizont/', '/product/torizont-rastvor');
Route::redirect('/torizont-2/', '/product/torizont-rastvor');
Route::redirect('/travolajf/', '/product/travolayf-maz');
Route::redirect('/travolajf-2/', '/product/travolayf-pastilki');
Route::redirect('/travolajf-3/', '/product/travolayf-sirop');
Route::redirect('/trivejt/', '/product/triveyt');
Route::redirect('/farfoleks/', '/product/farfoleks-rastvor');
Route::redirect('/farfoleks-2/', '/product/farfoleks-rastvor');
Route::redirect('/fiatfon/', '/product/fiatfon-poroshok-dlya-inekcii');
Route::redirect('/fiatfon-2/', '/product/fiatfon-tabletki');
Route::redirect('/flucel/', '/product');
Route::redirect('/cerebral/', '/product/cerebral');
Route::redirect('/ciprobel/', '/product/ciprobel');
Route::redirect('/jezolekt/', '/product/ezolekt');
Route::redirect('/jektivejn/', '/product/ektiveyn');
Route::redirect('/jenokt/', '/product/enokt');
Route::redirect('/jespaktiv-kids/', '/product/espaktiv-kids');
Route::redirect('/jespaktiv/', '/product/espaktiv-kapsuly');
Route::redirect('/jesfazh/', '/product/esfazh-ampuly');
Route::redirect('/jesfazh-2/', '/product/esfazh-kapsuly');
Route::redirect('/nosology/{path1}/{path2}', '/product');
Route::redirect('/nosology/{path1}/{path2}/{path3}', '/product');
Route::redirect('/chto-takoe-tromboobrazovanie/', '/newslifestyle/chto-takoe-tromboobrazovanie');
Route::redirect('/chto-takoe-ostraja-serdechnaja-nedostatochnost/', '/newslifestyle/chto-takoe-ostraya-serdechnaya-nedostatochnost');
Route::redirect('/7-prichin-est-bolshe-produktov-s-vitaminom-c-3/', '/newslifestyle');
Route::redirect('/trombojembolija-legochnoj-arterii/', '/newslifestyle/tromboemboliya-legochnoy-arterii-tela');
Route::redirect('/o-chem-govorit-kashel/', '/newslifestyle/o-chem-govorit-kashel');
Route::redirect('/stofeksim-suspenzija/', '/product/stofeksim-suspenziya');
Route::redirect('/lambrotin-tabletki/', '/product/lambrotin');
