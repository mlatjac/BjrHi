<?php

Auth::routes();

Route::get('/', function() {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

// Language switching
Route::get('lang/{languageCode}','\Mlatjac\FrEn\Http\Controllers\LanguageController@switchLang')->name('lang.switch');
