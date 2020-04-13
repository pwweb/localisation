<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use PWWEB\Localisation\Models\Address\Type;

/**
 * The database factory for Type.
 * Class AppBaseController.
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
*/
$factory->define(Type::class, function (Faker $faker) {
    return [
        'country_id' => $faker->word,
        'type_id' => $faker->word,
        'street' => $faker->word,
        'street2' => $faker->word,
        'city' => $faker->word,
        'state' => $faker->word,
        'postcode' => $faker->word,
        'lat' => $faker->randomDigitNotNull,
        'lng' => $faker->randomDigitNotNull,
        'primary' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
