<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\FieldAdminController;
use App\Http\Controllers\Admin\TeamAdminController;
use App\Http\Controllers\Admin\TeamMemberAdminController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Owner\FieldOwnerController;
use App\Http\Controllers\Owner\OwnerController;

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



#admin view using Controller


Route::resource('admin/roles', RoleAdminController::class);
Route::resource('admin/users', UserAdminController::class);
Route::resource('admin/fields', FieldAdminController::class);
Route::resource('admin/teams', TeamAdminController::class);
Route::resource('admin/team-members', TeamMemberAdminController::class);
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::group(['as'=>'owner.','prefix'=>'owner'], function (){

    Route::resource('fields', FieldOwnerController::class);
    Route::get('dashboard', [OwnerController::class, 'dashboard'])->name('dashboard');

});

Route::group(['as'=>'player.','prefix'=>'player'], function (){

    Route::resource('fields', FieldPlayerController::class);
    Route::resource('teams', TeamPlayerController::class);

    Route::get('dashboard', [PlayerController::class, 'dashboard'])->name('dashboard');
    Route::post('join-team', [PlayerController::class, 'joinTeam'])->name('join-team');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
