<?php
use App\Http\controllers\TodoController;
use App\Http\controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function() {
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    
});

// Route::group(['prefix'=> 'todo'],function(){
//     Route::post('add',[TodoController::class,'add']);
//     Route::post('remove/{todos_id}',[TodoController::class,'remove']);
//     Route::get('/{todos_id}',[TodoController::class,'show']);
//     Route::get('',[TodoController::class,'getAll']);
//     Route::post('update/{todos_id}',[TodoController::class,'update']);
// });

Route::group(['prefix'=> 'todo','middleware'=>'auth:api'],function(){
    Route::post('add',[TodoController::class,'add']);
    Route::post('remove/{todos_id}',[TodoController::class,'remove']);
    Route::get('/{todos_id}',[TodoController::class,'show']);
    Route::get('',[TodoController::class,'getAll']);
    Route::post('update/{todos_id}',[TodoController::class,'update']);
    Route::delete('delete/{todos_id}',[TodoController::class,'delete']);
});