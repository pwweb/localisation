<?php

Route::group(['prefix' => 'localisation', 'namespace' => 'PWWEB\Localisation\Controllers'], function () {
    Route::get('/', 'IndexController@index')->name('localisation.dashboard');
    Route::get('/switch/{locale}', 'LanguageController@switch')->name('localisation.switch');
    Route::get('/address/store', 'AddressController@store')->name('localisation.address.store');
});

Route::group(
    [
        'prefix' => 'addresses',
        'namespace' => '\PWWEB\Localisation\Controllers'
    ],
    function () {
        Route::group(
            [
                'prefix' => 'types',
                'namespace' => '\PWWEB\Localisation\Controllers\Address'
            ],
            function () {
                Route::get('/', 'TypeController@index')->name('localisation.address.type.index');
                Route::get('/show/{type}', 'TypeController@show')->name('localisation.address.type.show');
                Route::get('/edit/{type}', 'TypeController@edit')->name('localisation.address.type.edit');
                Route::get('/create', 'TypeController@create')->name('localisation.address.type.create');
                Route::patch('/update/{type}', 'TypeController@update')->name('localisation.address.type.update');
                Route::delete('/destroy/{type}', 'TypeController@destroy')->name('localisation.address.type.destroy');
                Route::post('/store', 'TypeController@store')->name('localisation.address.type.store');
            }
        );

        Route::get('/', 'AddressController@index');
    }
);
