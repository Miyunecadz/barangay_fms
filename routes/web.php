<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlotterController;
use App\Http\Controllers\CedulaController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\FileManager;
use App\Http\Livewire\Login;
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

Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::middleware('auth')->group(function(){
    Route::get('/', FileManager::class)->name('dashboard');
    Route::resource('resident', ResidentController::class);
    Route::get('/logout',[AuthenticationController::class, 'logout'])->name('auth.logout');
    Route::post('/file-preview', [FileController::class, 'open'])->name('file.open');

    Route::controller(CertificateController::class)->prefix('certificate')->group(function(){
        Route::get('/', [CertificateController::class, 'index'])->name('transaction.certificate-index');
        Route::get('/{id}/edit', [CertificateController::class, 'edit'])->name('transaction.certificate-edit');
        Route::get('/{id}/print-preview', [CertificateController::class, 'printPreview'])->name('transaction.certificate-print-preview');
        Route::delete('/{id}', [CertificateController::class, 'delete'])->name('transaction.certificate-delete');
    });

    Route::controller(CedulaController::class)->prefix('cedula')->group(function(){
        Route::get('/', 'index')->name('transaction.cedula-index');
        Route::post('/', 'store')->name('transaction.cedula-store');
        Route::get('/new', 'create')->name('transaction.cedula-create');
        Route::get('/{cedula}/edit', 'edit')->name('transaction.cedula-edit');
        Route::put('/{cedula}', 'update')->name('transaction.cedula-update');
        Route::delete('/{cedula}', 'destroy')->name('transaction.cedula-destroy');
    });

    Route::controller(BlotterController::class)->prefix('blotter')->group(function(){
        Route::get('/', 'index')->name('transaction.blotter-index');
        Route::get('/create', 'create')->name('transaction.blotter-create');
        Route::post('/', 'store')->name('transaction.blotter-store');
        Route::get('/{blotter}/edit', 'edit')->name('transaction.blotter-edit');
        Route::put('/{blotter}', 'update')->name('transaction.blotter-update');
        Route::delete('/{blotter}', 'destroy')->name('transaction.blotter-destroy');
    });

    Route::controller(ProfileController::class)->prefix('profile')->group(function(){
        Route::get('/', 'index')->name('profile.index');
        Route::put('/', 'update')->name('profile.update');
        Route::get('/password', 'passwordIndex')->name('password.index');
        Route::put('/password', 'passwordUpdate')->name('password.update');
    });

    Route::controller(SettingController::class)->prefix('setting')->group(function(){
        Route::get('/', 'index')->name('setting.index');
        Route::put('/', 'update')->name('setting.update');
    });
});
