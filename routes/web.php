<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return 'nayu misah :(';
});
 
Route::get('/login', [LoginController::class, 'index']);