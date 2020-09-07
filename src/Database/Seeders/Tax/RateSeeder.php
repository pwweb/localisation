<?php

/**
 * PWWEB\Localisation\Database\Seeders\Tax\Rate Seeder.
 *
 * Standard seeder for the Rate Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Database\Seeders\Tax;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateSeeder extends Seeder
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
        $rates = [];

        // Definition of default rates.
        $rates[] = ['rate' => 5.0, 'name' => '5%', 'type' => 2];
        $rates[] = ['rate' => 0.0, 'name' => '0%', 'type' => 3];
        $rates[] = ['rate' => 17.0, 'name' => '17%', 'type' => 1];
        $rates[] = ['rate' => 18.0, 'name' => '18%', 'type' => 1];
        $rates[] = ['rate' => 19.0, 'name' => '19%', 'type' => 1];
        $rates[] = ['rate' => 20.0, 'name' => '20%', 'type' => 1];
        $rates[] = ['rate' => 21.0, 'name' => '21%', 'type' => 1];
        $rates[] = ['rate' => 22.0, 'name' => '22%', 'type' => 1];
        $rates[] = ['rate' => 23.0, 'name' => '23%', 'type' => 1];
        $rates[] = ['rate' => 24.0, 'name' => '24%', 'type' => 1];
        $rates[] = ['rate' => 25.0, 'name' => '25%', 'type' => 1];
        $rates[] = ['rate' => 27.0, 'name' => '27%', 'type' => 1];

        foreach ($rates as $id => $rate) {
            $rates[$id] = array_merge($rate, ['created_at' => $createdAt, 'updated_at' => $createdAt]);
        }

        $tableNames = config('pwweb.localisation.table_names.tax');

        DB::table($tableNames['rates'])->insert($rates);
    }
}
