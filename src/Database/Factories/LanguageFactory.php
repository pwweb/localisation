<?php

use Faker\Generator as Faker;
use PWWEB\Localisation\Models\Language;

/**
 * The database factory for Language.
 * Class AppBaseController.
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @var       \Illuminate\Database\Eloquent\Factory $factory
*/
$factory->define(
    Language::class,
    function (Faker $faker) {
        return [
            'name' => $faker->word,
            'locale' => $faker->word,
            'abbreviation' => $faker->word,
            'installed' => $faker->word,
            'active' => $faker->word,
            'standard' => $faker->word,
            'created_at' => $faker->date('Y-m-d H:i:s'),
            'updated_at' => $faker->date('Y-m-d H:i:s')
        ];
    }
);
