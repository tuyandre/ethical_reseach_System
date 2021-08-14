<?php

use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//<Languages>

Route::get('lang/home', 'LangController@index');
Route::get('/lang/change', [LangController::class, 'change'])
    ->name('changeLang');
//</Languages>


Route::get('/ethical/admin/register', [AuthenticateController::class, 'adminRegister'])
    ->name('admin.register');
Route::post('/admin/register', [AuthenticateController::class, 'saveFirstRegister'])
    ->name('admin.store_register');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
