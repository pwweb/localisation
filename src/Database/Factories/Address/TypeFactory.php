<?php

namespace PWWEB\Localisation\Database\Factories\Address;

use PWWEB\Localisation\Models\Address\Type;

 /**
  * The database factory for Type.
  * Class AppBaseController.
  *
  * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
  * @author    Richard Browne <richard.browne@pw-websolutions.com
  * @copyright 2020 pw-websolutions.com
  * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
  * @var       \Illuminate\Database\Eloquent\Factory $factoryv
  */
 class TypeFactory extends Factory
 {
     /**
      * The name of the factory's corresponding model.
      *
      * @var string
      */
     protected $model = Type::class;

     /**
      * Define the model's default state.
      *
      * @return array
      */
     public function definition()
     {
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
             'updated_at' => $faker->date('Y-m-d H:i:s'),
         ];
     }
 }
