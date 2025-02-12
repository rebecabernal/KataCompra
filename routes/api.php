<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;


Route::get('/items', [ItemController::class, 'index'])->name('apiindex');
Route::post('/items', [ItemController::class, 'store'])->name('apistore');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('apishow');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('apiupdate');
Route::delete('/items', [ItemController::class, 'destroy'])->name('apidestroyall');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('apidestroy');

