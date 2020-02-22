<?php

Route::group(['prefix' => 'localisation', 'namespace' => 'PWWeb\Localisation\Controllers'], function() {
    Route::get('/', 'IndexController@index')->name('localisation.dashboard');
});