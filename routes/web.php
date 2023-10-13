<?php

use App\Http\Controllers\FormValidationController;
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

Route::post('!/forms/{form}/validate', FormValidationController::class)->name('forms.validate');

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);
