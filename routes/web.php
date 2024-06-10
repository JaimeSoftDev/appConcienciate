<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return
        redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix(('users'))->group(function () {
        Route::get('', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
        Route::post('', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
        Route::get('/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
        Route::put('/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
        Route::delete('/delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::prefix(('pshs'))->group(function () {
        Route::get('', [App\Http\Controllers\PshController::class, 'index'])->name('pshs.index');
        Route::get('/create', [App\Http\Controllers\PshController::class, 'create'])->name('pshs.create');
        Route::post('', [App\Http\Controllers\PshController::class, 'store'])->name('pshs.store');
        Route::get('/{psh}', [App\Http\Controllers\PshController::class, 'show'])->name('pshs.show');
        Route::get('/{psh}/edit', [App\Http\Controllers\PshController::class, 'edit'])->name('pshs.edit');
        Route::put('/update/{psh}', [App\Http\Controllers\PshController::class, 'update'])->name('pshs.update');
        Route::delete('/delete/{psh}', [App\Http\Controllers\PshController::class, 'destroy'])->name('pshs.destroy');
    });

    Route::prefix(('solicituds'))->group(function () {
        Route::get('', [App\Http\Controllers\SolicitudController::class, 'index'])->name('solicituds.index');
        Route::get('/iniciadas', [App\Http\Controllers\SolicitudController::class, 'getIniciadas'])->name('solicituds.iniciadas');
        Route::get('/proceso', [App\Http\Controllers\SolicitudController::class, 'getEnProceso'])->name('solicituds.proceso');
        Route::get('/finalizadas', [App\Http\Controllers\SolicitudController::class, 'getFinalizadas'])->name('solicituds.finalizadas');
        Route::get('/create', [App\Http\Controllers\SolicitudController::class, 'create'])->name('solicituds.create');
        Route::post('', [App\Http\Controllers\SolicitudController::class, 'store'])->name('solicituds.store');
        Route::get('/{solicitud}', [App\Http\Controllers\SolicitudController::class, 'show'])->name('solicituds.show');
        Route::get('/{solicitud}/edit', [App\Http\Controllers\SolicitudController::class, 'edit'])->name('solicituds.edit');
        Route::put('/update/{solicitud}', [App\Http\Controllers\SolicitudController::class, 'update'])->name('solicituds.update');
        Route::delete('/delete/{solicitud}', [App\Http\Controllers\SolicitudController::class, 'destroy'])->name('solicituds.destroy');
    });
    Route::prefix(('intervencions'))->group(function () {
        Route::get('', [App\Http\Controllers\IntervencionController::class, 'index'])->name('intervencions.index');
        Route::get('/psicologia', [App\Http\Controllers\IntervencionController::class, 'getPsicologia'])->name('intervencions.psocologia');
        Route::get('/trabajo-social', [App\Http\Controllers\IntervencionController::class, 'getTrabajoSocial'])->name('intervencions.trabajo-social');
        Route::get('/acogida', [App\Http\Controllers\IntervencionController::class, 'getAcogida'])->name('intervencions.acogida');
        Route::get('/create', [App\Http\Controllers\IntervencionController::class, 'create'])->name('intervencions.create');
        Route::post('', [App\Http\Controllers\IntervencionController::class, 'store'])->name('intervencions.store');
        Route::get('/{intervencion}', [App\Http\Controllers\IntervencionController::class, 'show'])->name('intervencions.show');
        Route::get('/{intervencion}/edit', [App\Http\Controllers\IntervencionController::class, 'edit'])->name('intervencions.edit');
        Route::put('/update/{intervencion}', [App\Http\Controllers\IntervencionController::class, 'update'])->name('intervencions.update');
        Route::delete('/delete/{intervencion}', [App\Http\Controllers\IntervencionController::class, 'destroy'])->name('intervencions.destroy');
    });

    Route::prefix(('camas'))->group(function () {
        Route::get('', [App\Http\Controllers\CamaController::class, 'index'])->name('camas.index');
        Route::get('/{cama}', [App\Http\Controllers\CamaController::class, 'show'])->name('camas.show');
        Route::get('/{cama}/edit', [App\Http\Controllers\CamaController::class, 'edit'])->name('camas.edit');
        Route::put('/{cama}', [App\Http\Controllers\CamaController::class, 'update'])->name('camas.update');
    });
});

require __DIR__ . '/auth.php';
