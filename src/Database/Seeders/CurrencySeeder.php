<?php

/**
 * PWWEB\Localisation\Database\Seeders\Currency Seeder.
 *
 * Standard seeder for the Currency Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
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
        $currencies = [];

        // Definition of default currencies.
        $currencies[] = ['name' => 'Australian Dollar', 'iso' => 'AUD', 'numeric_code' => '036', 'active' => '1', 'entity_code' => 'A$', 'standard' => '0'];
        $currencies[] = ['name' => 'Bulgarian Lev', 'iso' => 'BGN', 'numeric_code' => '975', 'active' => '0', 'entity_code' => 'lev', 'standard' => '0'];
        $currencies[] = ['name' => 'Brazilian Real', 'iso' => 'BRL', 'numeric_code' => '986', 'active' => '0', 'entity_code' => 'R$', 'standard' => '0'];
        $currencies[] = ['name' => 'Canadian Dollar', 'iso' => 'CAD', 'numeric_code' => '124', 'active' => '0', 'entity_code' => 'C$', 'standard' => '0'];
        $currencies[] = ['name' => 'Swiss Franc', 'iso' => 'CHF', 'numeric_code' => '756', 'active' => '0', 'entity_code' => 'SFr', 'standard' => '0'];
        $currencies[] = ['name' => 'Yuan Renminbi', 'iso' => 'CNY', 'numeric_code' => '156', 'active' => '0', 'entity_code' => '¥', 'standard' => '0'];
        $currencies[] = ['name' => 'Czech Koruna', 'iso' => 'CZK', 'numeric_code' => '203', 'active' => '0', 'entity_code' => 'Kč', 'standard' => '0'];
        $currencies[] = ['name' => 'Danish Krone', 'iso' => 'DKK', 'numeric_code' => '208', 'active' => '0', 'entity_code' => 'kr', 'standard' => '0'];
        $currencies[] = ['name' => 'Euro', 'iso' => 'EUR', 'numeric_code' => '978', 'active' => '1', 'entity_code' => '€', 'standard' => '0'];
        $currencies[] = ['name' => 'Pound Sterling', 'iso' => 'GBP', 'numeric_code' => '826', 'active' => '1', 'entity_code' => '£', 'standard' => '1'];
        $currencies[] = ['name' => 'Hong Kong Dollar', 'iso' => 'HKD', 'numeric_code' => '344', 'active' => '0', 'entity_code' => 'HK$', 'standard' => '0'];
        $currencies[] = ['name' => 'Croatian Kuna', 'iso' => 'HRK', 'numeric_code' => '191', 'active' => '0', 'entity_code' => 'kuna', 'standard' => '0'];
        $currencies[] = ['name' => 'Forint', 'iso' => 'HUF', 'numeric_code' => '348', 'active' => '0', 'entity_code' => 'Ft', 'standard' => '0'];
        $currencies[] = ['name' => 'Rupiah', 'iso' => 'IDR', 'numeric_code' => '360', 'active' => '0', 'entity_code' => 'Rp', 'standard' => '0'];
        $currencies[] = ['name' => 'New Israeli Sheqel', 'iso' => 'ILS', 'numeric_code' => '376', 'active' => '0', 'entity_code' => '₪', 'standard' => '0'];
        $currencies[] = ['name' => 'Indian Rupee', 'iso' => 'INR', 'numeric_code' => '356', 'active' => '0', 'entity_code' => '₹', 'standard' => '0'];
        $currencies[] = ['name' => 'Yen', 'iso' => 'JPY', 'numeric_code' => '392', 'active' => '0', 'entity_code' => '¥', 'standard' => '0'];
        $currencies[] = ['name' => 'Won', 'iso' => 'KRW', 'numeric_code' => '410', 'active' => '0', 'entity_code' => '₩', 'standard' => '0'];
        $currencies[] = ['name' => 'Lithuanian Litas', 'iso' => 'LTL', 'numeric_code' => '440', 'active' => '0', 'entity_code' => 'Lt', 'standard' => '0'];
        $currencies[] = ['name' => 'Latvian Lats', 'iso' => 'LVL', 'numeric_code' => '428', 'active' => '0', 'entity_code' => 'Ls', 'standard' => '0'];
        $currencies[] = ['name' => 'Mexican Peso', 'iso' => 'MXN', 'numeric_code' => '484', 'active' => '0', 'entity_code' => 'Mex$', 'standard' => '0'];
        $currencies[] = ['name' => 'Malaysian Ringgit', 'iso' => 'MYR', 'numeric_code' => '458', 'active' => '0', 'entity_code' => 'RM', 'standard' => '0'];
        $currencies[] = ['name' => 'Norwegian Krone', 'iso' => 'NOK', 'numeric_code' => '578', 'active' => '0', 'entity_code' => 'kr', 'standard' => '0'];
        $currencies[] = ['name' => 'New Zealand Dollar', 'iso' => 'NZD', 'numeric_code' => '554', 'active' => '0', 'entity_code' => 'NZ$', 'standard' => '0'];
        $currencies[] = ['name' => 'Philippine Peso', 'iso' => 'PHP', 'numeric_code' => '608', 'active' => '0', 'entity_code' => '₱', 'standard' => '0'];
        $currencies[] = ['name' => 'Zloty', 'iso' => 'PLN', 'numeric_code' => '985', 'active' => '0', 'entity_code' => 'zł', 'standard' => '0'];
        $currencies[] = ['name' => 'Leu', 'iso' => 'RON', 'numeric_code' => '946', 'active' => '0', 'entity_code' => 'leu', 'standard' => '0'];
        $currencies[] = ['name' => 'Russian Ruble', 'iso' => 'RUB', 'numeric_code' => '643', 'active' => '0', 'entity_code' => 'PP', 'standard' => '0'];
        $currencies[] = ['name' => 'Swedish Krona', 'iso' => 'SEK', 'numeric_code' => '752', 'active' => '0', 'entity_code' => 'kr', 'standard' => '0'];
        $currencies[] = ['name' => 'Singapore Dollar', 'iso' => 'SGD', 'numeric_code' => '702', 'active' => '0', 'entity_code' => 'S$', 'standard' => '0'];
        $currencies[] = ['name' => 'Baht', 'iso' => 'THB', 'numeric_code' => '764', 'active' => '0', 'entity_code' => '฿', 'standard' => '0'];
        $currencies[] = ['name' => 'Turkish Lira', 'iso' => 'TRY', 'numeric_code' => '949', 'active' => '0', 'entity_code' => 'TL', 'standard' => '0'];
        $currencies[] = ['name' => 'US Dollar', 'iso' => 'USD', 'numeric_code' => '840', 'active' => '1', 'entity_code' => '$', 'standard' => '0'];
        $currencies[] = ['name' => 'Rand', 'iso' => 'ZAR', 'numeric_code' => '710', 'active' => '0', 'entity_code' => 'R', 'standard' => '0'];

        foreach ($currencies as $id => $currency) {
            $currencies[$id] = array_merge($currency, ['created_at' => $createdAt, 'updated_at' => $createdAt]);
        }

        $tableNames = config('pwweb.localisation.table_names');

        DB::table($tableNames['currencies'])->insert($currencies);
    }
}
