<?php

/**
 * PWWeb\Localisation\Database\Seeders\Language Seeder
 *
 * Standard seeder for the Language Model.
 *
 * @package   PWWeb\Localisation
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use PWWeb\Localisation\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');

        $languages[] = ['name' => 'English', 'locale' => 'en-gb', 'abbreviation' => 'EN', 'installed' => '1', 'active' => '1','standard' => '0'];
        $languages[] = ['name' => 'German', 'locale' => 'de-de', 'abbreviation' => 'DE', 'installed' => '1', 'active' => '1','standard' => '0'];

        foreach ($languages as $id => $language) {
            $languages[$id] = array_merge($language, ['created_at' => $createdAt, 'updated_at' => $createdAt]);
        }

        $tableNames = config('localisation.table_names');

        DB::table($tableNames['languages'])->insert($languages);
    }
}
