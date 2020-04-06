<?php

Route::group(['prefix' => 'localisation', 'namespace' => 'PWWEB\Localisation\Controllers'], function () {
    Route::get('/', 'IndexController@index')->name('localisation.dashboard');
    Route::get('/switch/{locale}', 'LanguageController@switch')->name('localisation.switch');
    Route::get('/address/store', 'AddressController@store')->name('localisation.address.store');
});

Route::namespace('PWWEB\Localisation\Controllers')
    ->name('localisation.')
    // ->middleware('auth')
    ->group(
        function () {
            Route::namespace('Address')
                ->prefix('address')
                ->name('address.')
                // ->middleware('auth')
                ->group(
                    function () {
                        Route::resource('type', TypeController::class);
                    }
                );
        }
    );
