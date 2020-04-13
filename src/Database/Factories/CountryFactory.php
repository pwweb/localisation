<?php

use Faker\Generator as Faker;
use PWWEB\Localisation\Models\Country;

/**
 * The database factory for Country.
 * Class AppBaseController.
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @var       \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(
    Country::class,
    function (Faker $faker) {
        return [
            'name' => $faker->word,
            'iso' => $faker->word,
            'ioc' => $faker->word,
            'active' => $faker->word,
            'created_at' => $faker->date('Y-m-d H:i:s'),
            'updated_at' => $faker->date('Y-m-d H:i:s'),
        ];
    }
);
