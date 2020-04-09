<?php

/**
 * PWWEB\Localisation\Database\Seeders\Language Seeder.
 *
 * Standard seeder for the Language Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initializing variables.
        $createdAt = date('Y-m-d H:i:s');
        $languages = [];

        // Definition of default languages.
        $languages[] = ['name' => 'English', 'locale' => 'en-GB', 'abbreviation' => 'EN', 'installed' => '1', 'active' => '1', 'standard' => '1'];
        $languages[] = ['name' => 'German', 'locale' => 'de-DE', 'abbreviation' => 'DE', 'installed' => '1', 'active' => '1', 'standard' => '0'];

        foreach ($languages as $id => $language) {
            $languages[$id] = array_merge($language, ['created_at' => $createdAt, 'updated_at' => $createdAt]);
        }

        $tableNames = config('pwweb.localisation.table_names');

        DB::table($tableNames['languages'])->insert($languages);
    }
}
