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
Route::get('/catalog/{slug}',[PageController::class,'catalog']);
Route::get('/single',function (){
    return view('single');
});

Route::get('/contacts',function (){
    return view('contacts');
});
Route::get('/articles',function (){
    return view('articles');
});
Route::get('/articles-card',function (){
    return view('articles-card');
});
Route::get('/news',[PageController::class,'news']);
Route::get('/articles',[PageController::class,'articles']);
Route::get('/articles/{slug}',[PageController::class,'articlesSingle']);
Route::get('/news/{slug}',[PageController::class,'newsSingle']);
Route::get('/about',[PageController::class,'aboutPage']);
/* Sitemap */
Route::get('/sitemap', [SitemapController::class,'index']);
Route::get('/sitemap/products', [SitemapController::class,'products']);
Route::get('/sitemap/categories', [SitemapController::class,'categories']);
Route::get('/sitemap/tags', [SitemapController::class,'tags']);
Route::get('/sitemap/news', [SitemapController::class,'news']);
Route::get('/sitemap/articles', [SitemapController::class,'articles']);
