<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Products;
use App\Http\Livewire\Coins;
use App\Http\Livewire\Pos;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Permisos;
use App\Http\Livewire\Asignar;
use App\Http\Livewire\Users;
use App\Http\Livewire\Cashout;
use App\Http\Livewire\Reports;
use App\Http\Controllers\ExportController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('categories', Categories::class);
Route::get('products', Products::class);
Route::get('coins', Coins::class);
Route::get('pos', Pos::class);
Route::get('roles', Roles::class);
Route::get('permisos', Permisos::class);
Route::get('asignar', Asignar::class);
Route::get('users', Users::class);
Route::get('cashout', Cashout::class);
Route::get('reports', Reports::class);
Route::get('report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
Route::get('report/pdf/{user}/{type}', [ExportController::class, 'reportPDF']);