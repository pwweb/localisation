<?php

namespace PWWEB\Localisation\Database\Factories;

use PWWEB\Localisation\Models\Language;

 /**
  * The database factory for Language.
  * Class AppBaseController.
  *
  * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
  * @author    Richard Browne <richard.browne@pw-websolutions.com
  * @copyright 2020 pw-websolutions.com
  * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
  * @var       \Illuminate\Database\Eloquent\Factory $factory
  */
 class LanguageFactory extends Factory
 {
     /**
      * The name of the factory's corresponding model.
      *
      * @var string
      */
     protected $model = Language::class;

     /**
      * Define the model's default state.
      *
      * @return array
      */
     public function definition()
     {
         return [
             'name' => $faker->word,
             'locale' => $faker->word,
             'abbreviation' => $faker->word,
             'installed' => $faker->word,
             'active' => $faker->word,
             'standard' => $faker->word,
             'created_at' => $faker->date('Y-m-d H:i:s'),
             'updated_at' => $faker->date('Y-m-d H:i:s'),
         ];
     }
 }
