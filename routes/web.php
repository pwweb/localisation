<?php

Route::namespace('PWWEB\Localisation\Controllers')
    ->prefix('localisation')
    // ->midleware(['api', 'auth'])
    ->group(
        function () {
            Route::get('/', 'IndexController@index')->name('localisation.dashboard');
            Route::get('/change/{locale}', 'LanguageController@changeLocale')->name('localisation.switch');
            Route::get('/address/store', 'AddressController@store')->name('localisation.address.store');
        }
    );

Route::namespace('PWWEB\Localisation\Controllers')
    ->name('localisation.')
    ->middleware(['web', 'auth'])
    ->group(
        function () {
            Route::resource('countries', CountryController::class);
            Route::resource('currencies', CurrencyController::class);
            Route::resource('languages', LanguageController::class);
            Route::resource('addresses', AddressController::class);
            Route::namespace('Address')
                ->prefix('address')
                ->name('address.')
                // ->middleware('auth')
                ->group(
                    function () {
                        Route::resource('types', TypeController::class);
                    }
                );
        }
    );
