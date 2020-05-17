<?php

return [
    'models' => [
        /*
         *
         */

        'address' => PWWEB\Localisation\Models\Address::class,

        /*
         *
         */

        'address_type' => PWWEB\Localisation\Models\Address\Type::class,

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Country" model but you may use whatever you like.
         *
         * The model you want to use as a Country model needs to implement the
         * `PWWeb\Localisation\Contracts\Country` contract.
         */

        'country' => PWWEB\Localisation\Models\Country::class,

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Country" model but you may use whatever you like.
         *
         * The model you want to use as a Country model needs to implement the
         * `PWWeb\Localisation\Contracts\Country` contract.
         */

        'country' => PWWEB\Localisation\Models\Country::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Language" model but you may use whatever you like.
         *
         * The model you want to use as a Language model needs to implement the
         * `PWWeb\Localisation\Contracts\Language` contract.
         */

        'language' => PWWEB\Localisation\Models\Language::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Currency" model but you may use whatever you like.
         *
         * The model you want to use as a Currency model needs to implement the
         * `PWWeb\Localisation\Contracts\Currency` contract.
         */

        'currency' => PWWEB\Localisation\Models\Currency::class,

        /*
         * The model you want to use as for the Tax models.
         */

        'tax' => [

            /*
             * The model you want to use as a Rate model needs to implement the
             * `PWWeb\Localisation\Contracts\Tax\Rate` contract.
             */

            'rate' => PWWEB\Localisation\Models\Tax\Rate::class,

            /*
             * The model you want to use as a Location model needs to implement the
             * `PWWeb\Localisation\Contracts\Tax\Location` contract.
             */

            'location' => PWWEB\Localisation\Models\Tax\Location::class,
        ],
    ],

    'table_names' => [
        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'addresses' => 'system_addresses',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'address_types' => 'system_address_types',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'countries' => 'system_localisation_countries',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'languages' => 'system_localisation_languages',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'currencies' => 'system_localisation_currencies',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'country_has_language' => 'system_localisation_country_languages',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_address' => 'system_model_has_address',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'tax' => [

            /*
             * When using the "Tax Rates" from this package, we need to know which
             * table should be used to retrive your rates. We have chosen a basic
             * default value but you may easily change it to any table  you like.
             */

            'rates' => 'system_tax_rates',

            /*
             * When using the "Tax Locations" from this package, we need to know
             * which table should be used to retrive your rates. We have chosen
             * a basic default value but you may easily change it to any table
             * you like.
             */

            'locations' => 'system_tax_locations',
        ],
    ],

    'column_names' => [
        /*
         * Change this if you want to name the related model primary key other than
         * `model_id`.
         *
         * For example, this would be nice if your primary keys are all UUIDs. In
         * that case, name this `model_uuid`.
         */

        'model_morph_key' => 'model_id',
    ],

    'cache' => [
        /*
         * By default all permissions are cached for 24 hours to speed up performance.
         * When permissions or roles are updated the cache is flushed automatically.
         */

        'expiration_time' => \DateInterval::createFromDateString('24 hours'),

        /*
         * The cache key used to store all permissions.
         */

        'key' => 'pwweb.localisation.cache',

        /*
         * When checking for a permission against a model by passing a Permission
         * instance to the check, this key determines what attribute on the
         * Language model is used to cache against.
         *
         * Ideally, this should match your preferred way of checking languages, eg:
         * `$languages->enabled('german')` would be 'name'.
         */

        'model_key' => 'name',

        /*
         * You may optionally indicate a specific cache driver to use for permission and
         * role caching using any of the `store` drivers listed in the cache.php config
         * file. Using 'default' here means to use the `default` set in cache.php.
         */

        'store' => 'default',
    ],
];
