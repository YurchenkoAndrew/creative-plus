<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExecutionSchemeController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OurAdvantageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::apiResource('main-lead', IntroController::class);
Route::apiResource('portfolio', PortfolioController::class);
Route::post('mail', [MailController::class, 'sendMessage']);
Route::get('services', [ServicesController::class, 'getServices']);
Route::get('additional-services', [ServicesController::class, 'getAdditionalServices']);
Route::apiResource('about', AboutController::class);
Route::apiResource('our-advantage', OurAdvantageController::class);
Route::apiResource('execution', ExecutionSchemeController::class);
Route::apiResource('contacts', ContactController::class);
