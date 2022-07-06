<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
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
Route::get('/clear', function() {
     Artisan::call('cache:clear');
     Artisan::call('config:cache');
     Artisan::call('view:clear');
     Artisan::call('route:clear');
     Artisan::call('storage:link');
     return "Кэш очищен.";
 });
Route::get('/', [PageController::class,'index']);
Route::get('/catalog/{slug}',[PageController::class,'catalog'])->middleware('redirect');
Route::get('/catalog/{catSlug}/{slug}',[PageController::class,'single'])->middleware('redirect');
Route::post('/search/catalog',[PageController::class,'search']);

Route::get('/contacts',[PageController::class,'contacts']);
Route::post('/send-form/reducer',[\App\Http\Controllers\Admin\ReducerCrudController::class,'sendForm']);
Route::post('/send-form/gear',[\App\Http\Controllers\Admin\GearMotorCrudController::class,'sendForm']);
Route::get('/news',[PageController::class,'news']);
Route::get('/articles',[PageController::class,'articles']);
Route::get('/articles/{slug}',[PageController::class,'articlesSingle'])->middleware('redirect');
Route::get('/news/{slug}',[PageController::class,'newsSingle'])->middleware('redirect');
Route::get('/about',[PageController::class,'aboutPage']);
Route::post('/storeProductImages',[\App\Http\Controllers\Admin\ProductsCrudController::class,'storeImages'])->name('storeProductImages');
Route::post('/storeSizeImages',[\App\Http\Controllers\Admin\ReducerCrudController::class,'storeSizeImages'])->name('storeSizeImages');
Route::post('/makeOrder',[\App\Http\Controllers\Admin\OrderCrudController::class,'makeOrder']);
/* Sitemap */
Route::get('/sitemap', [SitemapController::class,'index']);
Route::get('/sitemap/products', [SitemapController::class,'products']);
Route::get('/sitemap/categories', [SitemapController::class,'categories']);
Route::get('/sitemap/tags', [SitemapController::class,'tags']);
Route::get('/sitemap/news', [SitemapController::class,'news']);
Route::get('/sitemap/articles', [SitemapController::class,'articles']);
