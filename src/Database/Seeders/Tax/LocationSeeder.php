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
        $locations[] = ['tax_rate_id' => 1, 'country_id' => 'United Kingdom'];
        $locations[] = ['tax_rate_id' => 1, 'country_id' => 'Croatia'];
        $locations[] = ['tax_rate_id' => 1, 'country_id' => 'Poland'];
        $locations[] = ['tax_rate_id' => 1, 'country_id' => 'Lithuania'];
        $locations[] = ['tax_rate_id' => 1, 'country_id' => 'Romania'];
        $locations[] = ['tax_rate_id' => 1, 'country_id' => 'Cyprus'];

        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'United Kingdom'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Hungary'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Sweden'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Denmark'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Poland'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Ireland'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Netherlands'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Latvia'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Belgium'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Bulgaria'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Germany'];
        $locations[] = ['tax_rate_id' => 2, 'country_id' => 'Malta'];

        $locations[] = ['tax_rate_id' => 3, 'country_id' => ['Luxembourg']];

        $locations[] = ['tax_rate_id' => 4, 'country_id' => ['Malta']];

        $locations[] = ['tax_rate_id' => 5, 'country_id' => 'Cyprus'];
        $locations[] = ['tax_rate_id' => 5, 'country_id' => 'Romania'];
        $locations[] = ['tax_rate_id' => 5, 'country_id' => 'Germany'];

        $locations[] = ['tax_rate_id' => 6, 'country_id' => 'Austria'];
        $locations[] = ['tax_rate_id' => 6, 'country_id' => 'Bulgaria'];
        $locations[] = ['tax_rate_id' => 6, 'country_id' => 'France'];
        $locations[] = ['tax_rate_id' => 6, 'country_id' => 'Slovakia'];
        $locations[] = ['tax_rate_id' => 6, 'country_id' => 'Estonia'];
        $locations[] = ['tax_rate_id' => 6, 'country_id' => 'United Kingdom'];

        $locations[] = ['tax_rate_id' => 7, 'country_id' => 'Belgium'];
        $locations[] = ['tax_rate_id' => 7, 'country_id' => 'Czech Republic'];
        $locations[] = ['tax_rate_id' => 7, 'country_id' => 'Latvia'];
        $locations[] = ['tax_rate_id' => 7, 'country_id' => 'Lithuania'];
        $locations[] = ['tax_rate_id' => 7, 'country_id' => 'Netherlands'];
        $locations[] = ['tax_rate_id' => 7, 'country_id' => 'Spain'];

        $locations[] = ['tax_rate_id' => 8, 'country_id' => 'Slovenia'];
        $locations[] = ['tax_rate_id' => 8, 'country_id' => 'Italy'];

        $locations[] = ['tax_rate_id' => 9, 'country_id' => 'Ireland'];
        $locations[] = ['tax_rate_id' => 9, 'country_id' => 'Poland'];
        $locations[] = ['tax_rate_id' => 9, 'country_id' => 'Portugal'];

        $locations[] = ['tax_rate_id' => 10, 'country_id' => 'Finland'];
        $locations[] = ['tax_rate_id' => 10, 'country_id' => 'Greece'];

        $locations[] = ['tax_rate_id' => 11, 'country_id' => 'Croatia'];
        $locations[] = ['tax_rate_id' => 11, 'country_id' => 'Denmark'];
        $locations[] = ['tax_rate_id' => 11, 'country_id' => 'Sweden'];

        $locations[] = ['tax_rate_id' => 12, 'country_id' => 'Hungary'];

        foreach ($locations as &$location) {
            $countries = $location['country_id'];
            $country = DB::table($tableNames['countries'])->where('name', $location['country_id'])->first();
            $location['country_id'] = $country->id;
            $location = array_merge($location, ['active' => false, 'created_at' => $createdAt, 'updated_at' => $createdAt]);
        }

        DB::table($tableNames['tax']['locations'])->insert($locations);
    }
}
