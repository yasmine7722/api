<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthContrller;
use App\Http\Controllers\VacheController;
use App\Http\Controllers\LaitController;
use App\Http\Controllers\LaitJeteController;
use App\Http\Controllers\LaitStockeController;
use App\Http\Controllers\LaitVenduController;
use App\Http\Controllers\TankController;



//auth
Route::post('/register', [AuthContrller::class, 'register']);
Route::post('/login', [AuthContrller::class, 'login']);

Route::group(['middlware' => ['auth:sanctum']], function () {

    Route::get('/user', [AuthContrller::class, 'user']);
    Route::post('/logout', [AuthContrller::class, 'logout']);
});
//vache
Route::get('/vache/{cin}', [VacheController::class, 'index']);
Route::post('/newvache', [VacheController::class, 'add']);
Route::get('/showvache/{id}', [VacheController::class, 'show']);

Route::post('/updatevache/{id}', [VacheController::class, 'update']);
//Lait recu
Route::get('/laitvache', [LaitController::class, 'index']);
Route::get('/laitvache/{id}', [LaitController::class, 'byVache']);
Route::post('/newlait', [LaitController::class, 'add']);
Route::get('/showlait/{id}', [LaitController::class, 'show']);

Route::post('/updatelait/{id}', [LaitController::class, 'update']);
//Lait Stocké
Route::get('/laitstocke/{id}', [LaitStockeController::class, 'index']);
Route::post('/newlaitst', [LaitStockeController::class, 'add']);
Route::get('/showlaitst/{id}', [LaitStockeController::class, 'show']);

Route::post('/updatelaitst/{id}', [LaitStockeController::class, 'update']);
//Lait Vendu
Route::get('/laitvendu/{id}', [LaitVenduController::class, 'index']);
Route::post('/newlaitvd', [LaitVenduController::class, 'add']);
Route::get('/showlaitvd/{id}', [LaitVenduController::class, 'show']);

Route::post('/updatelaitvd/{id}', [LaitVenduController::class, 'update']);
//Lait Jeté
Route::post('/laitjete/{id}', [LaitJeteController::class, 'index']);
Route::post('/newlaitjt', [LaitJeteController::class, 'add']);
Route::post('/showlaitjt/{id}', [LaitJeteController::class, 'show']);

Route::post('/updatelaitjt/{id}', [LaitJeteController::class, 'update']);
//Tank
Route::post('/tank/{id}', [TankController::class, 'index']);
Route::post('/newtank', [TankController::class, 'add']);
Route::post('/showtank/{id}', [TankController::class, 'show']);

Route::post('/updatetank/{id}', [TankController::class, 'update']);
