<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api_ids', function () {
    return response(array('id' => '001'));
});