<?php

use App\Http\Controllers\ParticipantsController;
use App\Participant;
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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('admin/peserta/import', [ParticipantsController::class, 'import'])->name('voyager.peserta.import');
    Route::post('admin/peserta/import', [ParticipantsController::class, 'postImportForm'])->name('voyager.peserta.post-import');
});
