<?php

use App\Http\Controllers\Api\BillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::get('/users', function (Request $request) {
    return response()->json([
        'status' => true,
        'users' => 'Listar Usuários'
    ]);
});

Route::get('bills', [BillController::class, 'index']); // http://localhost:8080/api/bills?page=2
