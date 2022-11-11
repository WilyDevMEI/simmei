<?php

use App\Http\Controllers\DealsController;
use App\Http\Controllers\IntroductionController;
use App\Http\Controllers\Teknisi\JartestController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\KunjunganMarketingController;
use App\Http\Controllers\KunjunganTeknisiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MappingController;
use App\Http\Controllers\NegoController;
use App\Http\Controllers\PenetrasiController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlantestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\Teknisi\KondisiController;
use App\Http\Controllers\Teknisi\PresentasiController;
use App\Http\Controllers\User\UserController;
use App\Models\Teknisi\KunjunganTeknisi;
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

Route::group(['middleware' => 'guest'], function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::get('/authenticate', 'getAuthenticate')->name('get.authenticate');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::controller(LoginController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout')->middleware('auth:web');
    });
    Route::get('/', function () {
        return view('layouts.dashboard');
    })->name('dashboard');

    Route::group(['middleware' => ['role:super_admin']], function () {
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::get('user/{user}/role', [UserController::class, 'hasRole'])->name('user.role');
        Route::post('user/{user}/assign-role', [UserController::class, 'assignRole'])->name('user.assign.role');
        Route::delete('role/{role}/{permission}', [RoleController::class, 'revokePermissionTo'])->name('revoke.permission');
        Route::post('role/{role}/permission', [RoleController::class, 'givePermission'])->name('role.permission');
    });
    Route::group(['middleware' => ['role:super_admin|admin']], function () {
        Route::resource('user', UserController::class);
    });

    Route::resource('konsumen', KonsumenController::class);
    Route::resource('product', ProductController::class);
    Route::get('view-po/{id}', [RelationshipController::class, 'open'])->name('open');
    Route::resource('relationship', RelationshipController::class);
    Route::resource('mapping', MappingController::class);
    Route::resource('penetrasi', PenetrasiController::class);
    Route::resource('nego', NegoController::class);
    Route::resource('plantest', PlantestController::class);
    Route::resource('deals', DealsController::class);
    Route::resource('supply', SupplyController::class);
    Route::resource('kunjunganmarketing', KunjunganMarketingController::class);
    Route::resource('jartest', JartestController::class);
    Route::resource('presentasi', PresentasiController::class);
    Route::resource('kunjunganteknisi', KunjunganTeknisiController::class);
    Route::resource('kondisi', KondisiController::class);
    Route::resource('introduction', IntroductionController::class);
});
