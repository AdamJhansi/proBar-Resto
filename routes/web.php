<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return 'nayu misah :(';
});

 
Route::get('/login', [LoginController::class, 'index']);