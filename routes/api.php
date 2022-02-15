<?php

use App\Http\Controllers\api\v1\RunnersController;
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

Route::prefix('v1')->controller(RunnersController::class)->group(function () {
    Route::get('runner/{runnerId}', 'index');
});
