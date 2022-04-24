<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::resource('project', 'ProjectController']);
Route::get('/project', [ProjectController::class, 'index']);
Route::Post('/project', [ProjectController::class, 'store']);
Route::get('/project/{id}', [ProjectController::class, 'show']);
Route::put('/project/{id}', [ProjectController::class, 'update']);
Route::Post('/file', [ProjectController::class, 'actionCreate']);
