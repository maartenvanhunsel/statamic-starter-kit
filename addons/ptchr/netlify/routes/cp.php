<?php

/*
|--------------------------------------------------------------------------
| CP routes
|--------------------------------------------------------------------------
*/

Route::prefix('netlify/')->name('netlify.')->group(function() {
    Route::get('/', 'OverviewController@index')->name('index');
    Route::get('/settings', 'SettingsController@index')->name('settings');
});

Route::middleware('web')->group(function() {
    Route::post('/ptchr/netlify/', 'SettingsController@update')->name('settings.update');
});
