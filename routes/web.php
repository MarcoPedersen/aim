<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\FieldAdminController;
use App\Http\Controllers\Admin\TeamAdminController;
use App\Http\Controllers\Admin\TeamMemberAdminController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Owner\FieldOwnerController;
use App\Http\Controllers\Owner\GameScheduleOwnerController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Owner\TeamOwnerController;

use App\Http\Controllers\Player\FieldPlayerController;
use App\Http\Controllers\Player\TeamPlayerController;

use App\Http\Controllers\Player\PlayerController;

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

Route::group(['as'=>'admin.','prefix'=>'admin'], function (){

    Route::resource('roles', RoleAdminController::class);
    Route::resource('users', UserAdminController::class);
    Route::resource('fields', FieldAdminController::class);
    Route::resource('teams', TeamAdminController::class);
    Route::resource('team-members', TeamMemberAdminController::class);
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

});

Route::group(['as'=>'owner.','prefix'=>'owner'], function (){

    Route::resource('fields', FieldOwnerController::class);
    Route::resource('teams', TeamOwnerController::class);
    Route::resource('game-schedules', GameScheduleOwnerController::class);
    Route::get('dashboard', [OwnerController::class, 'dashboard'])->name('dashboard');

});

Route::group(['as'=>'player.','prefix'=>'player'], function (){

    Route::resource('fields', FieldPlayerController::class);
    Route::resource('teams', TeamPlayerController::class);
    Route::get('dashboard', [PlayerController::class, 'dashboard'])->name('dashboard');
    Route::post('join-team', [PlayerController::class, 'joinTeam'])->name('join-team');
    Route::post('join-game', [PlayerController::class, 'joinGame'])->name('join-game');
    Route::delete('leave-game', [PlayerController::class, 'leaveGame'])->name('leave-game');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
