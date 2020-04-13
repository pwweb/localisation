<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use PWWEB\Localisation\Models\Currency;

/**
 * The database factory for Currency.
 * Class AppBaseController.
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
*/
$factory->define(Currency::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'iso' => $faker->word,
        'numeric_code' => $faker->randomDigitNotNull,
        'entity_code' => $faker->word,
        'active' => $faker->word,
        'standard' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
