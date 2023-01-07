<?php
use App\Http\Controllers\coursesController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\playgroundController;
use App\Http\Livewire\Courselive;
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

Route::get('playground', [playgroundController::class, 'playground']);
Route::get("courselive", Courselive::class);
Route::get('/', [homeController::class, 'home'])->name('home');
Route::get('courses', [coursesController::class, 'courses'])->name('courses');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



