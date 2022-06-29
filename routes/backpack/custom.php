<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('tag', 'TagCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::crud('about-page', 'AboutPageCrudController');
    Route::crud('products', 'ProductsCrudController');
    Route::crud('categories', 'CategoriesCrudController');
    Route::crud('type-of-transmission', 'TypeOfTransmissionCrudController');
    Route::crud('number-of-transfer-stages', 'NumberOfTransferStagesCrudController');
    Route::crud('gear-ratio', 'GearRatioCrudController');
    Route::crud('location-of-axes', 'LocationOfAxesCrudController');
    Route::crud('articles', 'ArticlesCrudController');
    Route::crud('group', 'GroupCrudController');
    Route::crud('paw', 'PawCrudController');
    Route::crud('flange', 'FlangeCrudController');
    Route::crud('build-options', 'BuildOptionsCrudController');
    Route::crud('series', 'SeriesCrudController');
    Route::crud('meta-page', 'MetaPageCrudController');
}); // this should be the absolute last line of this file