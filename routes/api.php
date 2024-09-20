<?php

use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

/*
Route::get('/users', function (Request $request) {
    return response()->json([
        'status' => true,
        'users' => 'Listar Usuários'
    ]);
});
*/

Route::get('/users',[UserController::class, 'index']);             // GET - http://localhost:8080/api/users?page=2
Route::get('/users/{user}',[UserController::class, 'show']);       // GET -http://localhost:8080/api/users/1

Route::get('/bills',[BillController::class, 'index']);             // GET - http://localhost:8080/api/bills?page=2
Route::get('/bills/{bill}',[BillController::class, 'show']);       // GET - http://localhost:8080/api/bills/1
Route::post('/bills',[BillController::class, 'store']);            // POST - http://localhost:8080/api/bills
Route::put('/bills/{bill}',[BillController::class, 'update']);     // PUT - http://localhost:8080/api/bills/1
Route::delete('/bills/{bill}',[BillController::class, 'destroy']); // PUT - http://localhost:8080/api/bills/1


