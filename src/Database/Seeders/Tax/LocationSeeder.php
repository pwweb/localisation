<?php

/**
 * PWWEB\Localisation\Database\Seeders\Tax\Location Seeder.
 *
 * Standard seeder for the Location Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Database\Seeders\Tax;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
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
        $locations = [];

        $tableNames = config('pwweb.localisation.table_names');

        // Definition of default locations.
        $locations[] = ['tax_rate_id' => 1, 'country_id' => ['United Kingdom', 'Croatia', 'Poland', 'Lithuania', 'Romania', 'Cyprus', 'Malta']];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => ['United Kingdom', 'Hungary', 'Sweden', 'Denmark', 'Poland', 'Ireland', 'Netherlands', 'Latvia', 'Belgium', 'Bulgaria', 'Germany', 'Malta']];
        $locations[] = ['tax_rate_id' => 3, 'country_id' => ['Luxembourg']];
        $locations[] = ['tax_rate_id' => 4, 'country_id' => ['Malta']];
        $locations[] = ['tax_rate_id' => 5, 'country_id' => ['Cyprus', 'Romania', 'Germany']];
        $locations[] = ['tax_rate_id' => 6, 'country_id' => ['Austria', 'Bulgaria', 'France', 'Slovakia', 'Estonia', 'United Kingdom']];
        $locations[] = ['tax_rate_id' => 7, 'country_id' => ['Belgium', 'Czech Republic', 'Latvia', 'Lithuania', 'Netherlands', 'Spain']];
        $locations[] = ['tax_rate_id' => 8, 'country_id' => ['Slovenia', 'Italy']];
        $locations[] = ['tax_rate_id' => 9, 'country_id' => ['Ireland', 'Poland', 'Portugal']];
        $locations[] = ['tax_rate_id' => 10, 'country_id' => ['Finland', 'Greece']];
        $locations[] = ['tax_rate_id' => 11, 'country_id' => ['Croatia', 'Denmark', 'Sweden']];
        $locations[] = ['tax_rate_id' => 12, 'country_id' => ['Hungary']];

        foreach ($locations as &$location) {
            $flag = true;
            $countries = $location['country_id'];
            if (true === is_array($countries)) {
                foreach ($countries as $country) {
                    $country = DB::table($tableNames['countries'])->where('name', $country)->first();
                    if (true === $flag) {
                        $location['country_id'] = $country->id;
                        $flag = false;
                    } else {
                        $locations[] = ['tax_rate_id' => $location['tax_rate_id'], 'country_id' => $country->id];
                    }
                }
            }
            $location = array_merge($location, ['active' => false, 'created_at' => $createdAt, 'updated_at' => $createdAt]);
        }

        DB::table($tableNames['tax']['locations'])->insert($locations);
    }
}
