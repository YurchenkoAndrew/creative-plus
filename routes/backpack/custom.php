<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('intro', 'IntroCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('about', 'AboutCrudController');
    Route::crud('ouradvantage', 'OurAdvantageCrudController');
    Route::crud('portfolioblock', 'PortfolioBlockCrudController');
    Route::crud('portfolioitem', 'PortfolioItemCrudController');
    Route::crud('executionscheme', 'ExecutionSchemeCrudController');
    Route::crud('additionalservice', 'AdditionalServiceCrudController');
    Route::crud('contact', 'ContactCrudController');
}); // this should be the absolute last line of this file
