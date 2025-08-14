<?php

use App\Http\Controllers\ExpensesController;
use Illuminate\Support\Facades\Route;

Route::get('/expenses',  function () {
    return view("expenses_list");
});

Route::get('/expenses', [ExpensesController::class, 'index'])
    ->name('expenses');
