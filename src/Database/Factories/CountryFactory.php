<?php

namespace PWWEB\Localisation\Database\Factories;

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
 class CountryFactory extends Factory
 {
     /**
      * The name of the factory's corresponding model.
      *
      * @var string
      */
     protected $model = Country::class;

     /**
      * Define the model's default state.
      *
      * @return array
      */
     public function definition()
     {
         return [
             'name' => $faker->word,
             'iso' => $faker->word,
             'ioc' => $faker->word,
             'active' => $faker->word,
             'created_at' => $faker->date('Y-m-d H:i:s'),
             'updated_at' => $faker->date('Y-m-d H:i:s'),
         ];
     }
 }
