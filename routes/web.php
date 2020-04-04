<?php

Route::group(['prefix' => 'localisation', 'namespace' => 'PWWeb\Localisation\Controllers'], function () {
    Route::get('/', 'IndexController@index')->name('localisation.dashboard');
    Route::get('/switch/{locale}', 'LanguageController@switch')->name('localisation.switch');
    Route::get('/address/store', 'AddressController@store')->name('localisation.address.store');
});
