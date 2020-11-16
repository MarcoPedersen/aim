<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;

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

Route::get('/', function () {
    return view('welcome');
});

#roles view using Controller

Route::resource('admin/roles', RoleController::class);
Route::resource('admin/users', UserController::class);
Route::resource('admin/fields', FieldController::class);
Route::resource('admin/teams', TeamController::class);
Route::resource('admin/team-members', TeamMemberController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
