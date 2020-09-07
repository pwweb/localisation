<?php

/**
 * PWWEB\Localisation\Database\Seeders\Address\Type Seeder.
 *
 * Standard seeder for the Address Types Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Database\Seeders\Address;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
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
        $types = [];

        // Definition of default countries.
        $types[] = ['name' => 'home', 'global' => true];
        $types[] = ['name' => 'work', 'global' => true];
        $types[] = ['name' => 'billing', 'global' => true];
        $types[] = ['name' => 'shipping', 'global' => true];
        $types[] = ['name' => 'other', 'global' => true];

        foreach ($types as $id => $type) {
            $types[$id] = array_merge($type, ['created_at' => $createdAt, 'updated_at' => $createdAt]);
        }

        $tableNames = config('pwweb.localisation.table_names');

        DB::table($tableNames['address_types'])->insert($types);
    }
}
