<?php
use App\Http\Controllers\transcribe;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', [transcribe::class, 'index']);
Route::get('/transcripts', [transcribe::class, 'request']);
Route::get('/users', function(){
    return view('text');

});
Route::webhooks('webhook');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('transcript');
})->name('dashboard');
