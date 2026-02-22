<?php

use Illuminate\Support\Facades\Route;

Route::get('/layouts', function () {
    return view('layouts.app');
});
