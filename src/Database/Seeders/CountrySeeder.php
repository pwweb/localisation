<?php

/**
 * PWWeb\Localisation\Database\Seeders\Country Seeder.
 *
 * Standard seeder for the Country Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
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
        $countries = [];

        // Definition of default countries.
        $countries[] = ['iso' => 'AF', 'ioc' => 'AFG', 'name' => 'Afghanistan', 'active' => 0];
        $countries[] = ['iso' => 'AL', 'ioc' => 'ALB', 'name' => 'Albania', 'active' => 0];
        $countries[] = ['iso' => 'DZ', 'ioc' => 'ALG', 'name' => 'Algeria', 'active' => 0];
        $countries[] = ['iso' => 'AS', 'ioc' => 'ASA', 'name' => 'American Samoa', 'active' => 0];
        $countries[] = ['iso' => 'AD', 'ioc' => 'AND', 'name' => 'Andorra', 'active' => 0];
        $countries[] = ['iso' => 'AO', 'ioc' => 'ANG', 'name' => 'Angola', 'active' => 0];
        $countries[] = ['iso' => 'AI', 'ioc' => null, 'name' => 'Anguilla', 'active' => 0];
        $countries[] = ['iso' => 'AQ', 'ioc' => null, 'name' => 'Antarctica', 'active' => 0];
        $countries[] = ['iso' => 'AG', 'ioc' => 'ANT', 'name' => 'Antigua and Barbuda', 'active' => 0];
        $countries[] = ['iso' => 'AR', 'ioc' => 'ARG', 'name' => 'Argentina', 'active' => 0];
        $countries[] = ['iso' => 'AM', 'ioc' => 'ARM', 'name' => 'Armenia', 'active' => 0];
        $countries[] = ['iso' => 'AW', 'ioc' => 'ARU', 'name' => 'Aruba', 'active' => 0];
        $countries[] = ['iso' => 'AU', 'ioc' => 'AUS', 'name' => 'Australia', 'active' => 0];
        $countries[] = ['iso' => 'AT', 'ioc' => 'AUT', 'name' => 'Austria', 'active' => 1];
        $countries[] = ['iso' => 'AZ', 'ioc' => 'AZE', 'name' => 'Azerbaijan', 'active' => 0];
        $countries[] = ['iso' => 'BS', 'ioc' => 'BAH', 'name' => 'Bahamas', 'active' => 0];
        $countries[] = ['iso' => 'BH', 'ioc' => 'BRN', 'name' => 'Bahrain', 'active' => 0];
        $countries[] = ['iso' => 'BD', 'ioc' => 'BAN', 'name' => 'Bangladesh', 'active' => 0];
        $countries[] = ['iso' => 'BB', 'ioc' => 'BAR', 'name' => 'Barbados', 'active' => 0];
        $countries[] = ['iso' => 'BY', 'ioc' => 'BLR', 'name' => 'Belarus', 'active' => 0];
        $countries[] = ['iso' => 'BE', 'ioc' => 'BEL', 'name' => 'Belgium', 'active' => 0];
        $countries[] = ['iso' => 'BZ', 'ioc' => 'BIZ', 'name' => 'Belize', 'active' => 0];
        $countries[] = ['iso' => 'BJ', 'ioc' => 'BEN', 'name' => 'Benin', 'active' => 0];
        $countries[] = ['iso' => 'BM', 'ioc' => 'BER', 'name' => 'Bermuda', 'active' => 0];
        $countries[] = ['iso' => 'BT', 'ioc' => 'BHU', 'name' => 'Bhutan', 'active' => 0];
        $countries[] = ['iso' => 'BO', 'ioc' => 'BOL', 'name' => 'Bolivia', 'active' => 0];
        $countries[] = ['iso' => 'BA', 'ioc' => 'BIH', 'name' => 'Bosnia and Herzegowina', 'active' => 0];
        $countries[] = ['iso' => 'BW', 'ioc' => 'BOT', 'name' => 'Botswana', 'active' => 0];
        $countries[] = ['iso' => 'BV', 'ioc' => null, 'name' => 'Bouvet Island', 'active' => 0];
        $countries[] = ['iso' => 'BR', 'ioc' => 'BRA', 'name' => 'Brazil', 'active' => 0];
        $countries[] = ['iso' => 'IO', 'ioc' => null, 'name' => 'British Indian Ocean Territory', 'active' => 0];
        $countries[] = ['iso' => 'BN', 'ioc' => 'BRU', 'name' => 'Brunei Darussalam', 'active' => 0];
        $countries[] = ['iso' => 'BG', 'ioc' => 'BUL', 'name' => 'Bulgaria', 'active' => 0];
        $countries[] = ['iso' => 'BF', 'ioc' => 'BUR', 'name' => 'Burkina Faso', 'active' => 0];
        $countries[] = ['iso' => 'BI', 'ioc' => 'BDI', 'name' => 'Burundi', 'active' => 0];
        $countries[] = ['iso' => 'KH', 'ioc' => 'CAM', 'name' => 'Cambodia', 'active' => 0];
        $countries[] = ['iso' => 'CM', 'ioc' => 'CMR', 'name' => 'Cameroon', 'active' => 0];
        $countries[] = ['iso' => 'CA', 'ioc' => 'CAN', 'name' => 'Canada', 'active' => 0];
        $countries[] = ['iso' => 'CV', 'ioc' => 'CPV', 'name' => 'Cape Verde', 'active' => 0];
        $countries[] = ['iso' => 'KY', 'ioc' => 'CAY', 'name' => 'Cayman Islands', 'active' => 0];
        $countries[] = ['iso' => 'CF', 'ioc' => 'CAF', 'name' => 'Central African Republic', 'active' => 0];
        $countries[] = ['iso' => 'TD', 'ioc' => 'CHA', 'name' => 'Chad', 'active' => 0];
        $countries[] = ['iso' => 'CL', 'ioc' => 'CHI', 'name' => 'Chile', 'active' => 0];
        $countries[] = ['iso' => 'CN', 'ioc' => 'CNI', 'name' => 'China', 'active' => 0];
        $countries[] = ['iso' => 'CX', 'ioc' => null, 'name' => 'Christmas Island', 'active' => 0];
        $countries[] = ['iso' => 'CC', 'ioc' => null, 'name' => 'Cocos (Keeling) Islands', 'active' => 0];
        $countries[] = ['iso' => 'CO', 'ioc' => 'COL', 'name' => 'Colombia', 'active' => 0];
        $countries[] = ['iso' => 'KM', 'ioc' => 'COM', 'name' => 'Comoros', 'active' => 0];
        $countries[] = ['iso' => 'CG', 'ioc' => null, 'name' => 'Congo', 'active' => 0];
        $countries[] = ['iso' => 'CD', 'ioc' => 'COD', 'name' => 'Congo, The Democratic Republic of the', 'active' => 0];
        $countries[] = ['iso' => 'CK', 'ioc' => 'COK', 'name' => 'Cook Islands', 'active' => 0];
        $countries[] = ['iso' => 'CR', 'ioc' => 'CRC', 'name' => 'Costa Rica', 'active' => 0];
        $countries[] = ['iso' => 'CI', 'ioc' => 'CIV', 'name' => 'Ivory Coast', 'active' => 0];
        $countries[] = ['iso' => 'HR', 'ioc' => 'CRO', 'name' => 'Croatia', 'active' => 0];
        $countries[] = ['iso' => 'CU', 'ioc' => 'CUB', 'name' => 'Cuba', 'active' => 0];
        $countries[] = ['iso' => 'CY', 'ioc' => 'CYP', 'name' => 'Cyprus', 'active' => 0];
        $countries[] = ['iso' => 'CZ', 'ioc' => 'CZE', 'name' => 'Czech Republic', 'active' => 0];
        $countries[] = ['iso' => 'DK', 'ioc' => 'DEN', 'name' => 'Denmark', 'active' => 0];
        $countries[] = ['iso' => 'DJ', 'ioc' => 'DJI', 'name' => 'Djibouti', 'active' => 0];
        $countries[] = ['iso' => 'DM', 'ioc' => 'DMA', 'name' => 'Dominica', 'active' => 0];
        $countries[] = ['iso' => 'DO', 'ioc' => 'DOM', 'name' => 'Dominican Republic', 'active' => 0];
        $countries[] = ['iso' => 'EC', 'ioc' => 'ECU', 'name' => 'Ecuador', 'active' => 0];
        $countries[] = ['iso' => 'EG', 'ioc' => 'EGY', 'name' => 'Egypt', 'active' => 0];
        $countries[] = ['iso' => 'SV', 'ioc' => 'ESA', 'name' => 'El Salvador', 'active' => 0];
        $countries[] = ['iso' => 'GQ', 'ioc' => 'GEQ', 'name' => 'Equatorial Guinea', 'active' => 0];
        $countries[] = ['iso' => 'ER', 'ioc' => 'ERI', 'name' => 'Eritrea', 'active' => 0];
        $countries[] = ['iso' => 'EE', 'ioc' => 'EST', 'name' => 'Estonia', 'active' => 0];
        $countries[] = ['iso' => 'ET', 'ioc' => 'ETH', 'name' => 'Ethiopia', 'active' => 0];
        $countries[] = ['iso' => 'FK', 'ioc' => null, 'name' => 'Falkland Islands (Malvinas)', 'active' => 0];
        $countries[] = ['iso' => 'FO', 'ioc' => 'FRO', 'name' => 'Faroe Islands', 'active' => 0];
        $countries[] = ['iso' => 'FJ', 'ioc' => 'FIJ', 'name' => 'Fiji', 'active' => 0];
        $countries[] = ['iso' => 'FI', 'ioc' => 'FIN', 'name' => 'Finland', 'active' => 0];
        $countries[] = ['iso' => 'FR', 'ioc' => 'FRA', 'name' => 'France', 'active' => 0];
        $countries[] = ['iso' => 'GF', 'ioc' => null, 'name' => 'French Guiana', 'active' => 0];
        $countries[] = ['iso' => 'PF', 'ioc' => null, 'name' => 'French Polynesia', 'active' => 0];
        $countries[] = ['iso' => 'TF', 'ioc' => null, 'name' => 'French Southern Territories', 'active' => 0];
        $countries[] = ['iso' => 'GA', 'ioc' => 'GAB', 'name' => 'Gabon', 'active' => 0];
        $countries[] = ['iso' => 'GM', 'ioc' => 'GAM', 'name' => 'Gambia', 'active' => 0];
        $countries[] = ['iso' => 'GE', 'ioc' => 'GEO', 'name' => 'Georgia', 'active' => 0];
        $countries[] = ['iso' => 'DE', 'ioc' => 'GER', 'name' => 'Germany', 'active' => 1];
        $countries[] = ['iso' => 'GH', 'ioc' => 'GHA', 'name' => 'Ghana', 'active' => 0];
        $countries[] = ['iso' => 'GI', 'ioc' => null, 'name' => 'Gibraltar', 'active' => 0];
        $countries[] = ['iso' => 'GR', 'ioc' => 'GRE', 'name' => 'Greece', 'active' => 0];
        $countries[] = ['iso' => 'GL', 'ioc' => null, 'name' => 'Greenland', 'active' => 0];
        $countries[] = ['iso' => 'GD', 'ioc' => 'GRN', 'name' => 'Grenada', 'active' => 0];
        $countries[] = ['iso' => 'GP', 'ioc' => null, 'name' => 'Guadeloupe', 'active' => 0];
        $countries[] = ['iso' => 'GU', 'ioc' => 'GUM', 'name' => 'Guam', 'active' => 0];
        $countries[] = ['iso' => 'GT', 'ioc' => 'GUA', 'name' => 'Guatemala', 'active' => 0];
        $countries[] = ['iso' => 'GN', 'ioc' => 'GUI', 'name' => 'Guinea', 'active' => 0];
        $countries[] = ['iso' => 'GW', 'ioc' => 'GBS', 'name' => 'Guinea-Bissau', 'active' => 0];
        $countries[] = ['iso' => 'GY', 'ioc' => 'GUY', 'name' => 'Guyana', 'active' => 0];
        $countries[] = ['iso' => 'HT', 'ioc' => 'HAI', 'name' => 'Haiti', 'active' => 0];
        $countries[] = ['iso' => 'HM', 'ioc' => null, 'name' => 'Heard Island and McDonald Islands', 'active' => 0];
        $countries[] = ['iso' => 'VA', 'ioc' => null, 'name' => 'Holy See (Vatican City State)', 'active' => 0];
        $countries[] = ['iso' => 'HN', 'ioc' => 'HON', 'name' => 'Honduras', 'active' => 0];
        $countries[] = ['iso' => 'HK', 'ioc' => 'HKG', 'name' => 'Hong Kong', 'active' => 0];
        $countries[] = ['iso' => 'HU', 'ioc' => 'HUN', 'name' => 'Hungary', 'active' => 0];
        $countries[] = ['iso' => 'IS', 'ioc' => 'ISL', 'name' => 'Iceland', 'active' => 0];
        $countries[] = ['iso' => 'IN', 'ioc' => 'IND', 'name' => 'India', 'active' => 0];
        $countries[] = ['iso' => 'ID', 'ioc' => 'INA', 'name' => 'Indonesia', 'active' => 0];
        $countries[] = ['iso' => 'IR', 'ioc' => 'IRI', 'name' => 'Iran, Islamic Republic of', 'active' => 0];
        $countries[] = ['iso' => 'IQ', 'ioc' => 'IRQ', 'name' => 'Iraq', 'active' => 0];
        $countries[] = ['iso' => 'IE', 'ioc' => 'IRL', 'name' => 'Ireland', 'active' => 0];
        $countries[] = ['iso' => 'IL', 'ioc' => 'ISR', 'name' => 'Isreal', 'active' => 0];
        $countries[] = ['iso' => 'IT', 'ioc' => 'ITA', 'name' => 'Italy', 'active' => 0];
        $countries[] = ['iso' => 'JM', 'ioc' => 'JAM', 'name' => 'Jamaica', 'active' => 0];
        $countries[] = ['iso' => 'JP', 'ioc' => 'JAP', 'name' => 'Japan', 'active' => 0];
        $countries[] = ['iso' => 'JO', 'ioc' => 'JOR', 'name' => 'Jordan', 'active' => 0];
        $countries[] = ['iso' => 'KZ', 'ioc' => 'KAZ', 'name' => 'Kazakhstan', 'active' => 0];
        $countries[] = ['iso' => 'KE', 'ioc' => 'KEN', 'name' => 'Kenya', 'active' => 0];
        $countries[] = ['iso' => 'KI', 'ioc' => 'KIR', 'name' => 'Kiribati', 'active' => 0];
        $countries[] = ['iso' => 'KP', 'ioc' => 'PRK', 'name' => 'Korea, Democratic People\'s Republic of', 'active' => 0];
        $countries[] = ['iso' => 'KR', 'ioc' => 'KOR', 'name' => 'Korea, Republic of', 'active' => 0];
        $countries[] = ['iso' => 'KW', 'ioc' => 'KUW', 'name' => 'Kuwait', 'active' => 0];
        $countries[] = ['iso' => 'KG', 'ioc' => 'KGZ', 'name' => 'Kyrgyzstan', 'active' => 0];
        $countries[] = ['iso' => 'LA', 'ioc' => null, 'name' => 'Lao People\'s Democratic Republic', 'active' => 0];
        $countries[] = ['iso' => 'LV', 'ioc' => 'LAT', 'name' => 'Latvia', 'active' => 0];
        $countries[] = ['iso' => 'LB', 'ioc' => 'LBN', 'name' => 'Lebanon', 'active' => 0];
        $countries[] = ['iso' => 'LS', 'ioc' => 'LES', 'name' => 'Lesotho', 'active' => 0];
        $countries[] = ['iso' => 'LR', 'ioc' => 'LBR', 'name' => 'Liberia', 'active' => 0];
        $countries[] = ['iso' => 'LY', 'ioc' => 'LBA', 'name' => 'Libya', 'active' => 0];
        $countries[] = ['iso' => 'LI', 'ioc' => 'LIE', 'name' => 'Liechtenstein', 'active' => 0];
        $countries[] = ['iso' => 'LT', 'ioc' => 'LTU', 'name' => 'Lithuania', 'active' => 0];
        $countries[] = ['iso' => 'LU', 'ioc' => 'LUX', 'name' => 'Luxembourg', 'active' => 0];
        $countries[] = ['iso' => 'MO', 'ioc' => 'MAC', 'name' => 'Macao', 'active' => 0];
        $countries[] = ['iso' => 'MG', 'ioc' => 'MAD', 'name' => 'Madagascar', 'active' => 0];
        $countries[] = ['iso' => 'MW', 'ioc' => 'MAW', 'name' => 'Malawi', 'active' => 0];
        $countries[] = ['iso' => 'MY', 'ioc' => 'MAL', 'name' => 'Malaysia', 'active' => 0];
        $countries[] = ['iso' => 'MV', 'ioc' => 'MDV', 'name' => 'Maldives', 'active' => 0];
        $countries[] = ['iso' => 'ML', 'ioc' => 'MLI', 'name' => 'Mali', 'active' => 0];
        $countries[] = ['iso' => 'MT', 'ioc' => 'MLT', 'name' => 'Malta', 'active' => 0];
        $countries[] = ['iso' => 'MH', 'ioc' => 'MHL', 'name' => 'Marshall Islands', 'active' => 0];
        $countries[] = ['iso' => 'MQ', 'ioc' => null, 'name' => 'Martinique', 'active' => 0];
        $countries[] = ['iso' => 'MR', 'ioc' => 'MTN', 'name' => 'Mauritania', 'active' => 0];
        $countries[] = ['iso' => 'MU', 'ioc' => 'MRI', 'name' => 'Mauritius', 'active' => 0];
        $countries[] = ['iso' => 'YT', 'ioc' => null, 'name' => 'Mayotte', 'active' => 0];
        $countries[] = ['iso' => 'MX', 'ioc' => 'MEX', 'name' => 'Mexico', 'active' => 0];
        $countries[] = ['iso' => 'FM', 'ioc' => null, 'name' => 'Micronesia, Federated States of', 'active' => 0];
        $countries[] = ['iso' => 'MD', 'ioc' => 'MDA', 'name' => 'Moldova, Republic of', 'active' => 0];
        $countries[] = ['iso' => 'MC', 'ioc' => 'MON', 'name' => 'Monaco', 'active' => 0];
        $countries[] = ['iso' => 'MN', 'ioc' => 'MGL', 'name' => 'Mongolia', 'active' => 0];
        $countries[] = ['iso' => 'MS', 'ioc' => null, 'name' => 'Montserrat', 'active' => 0];
        $countries[] = ['iso' => 'MA', 'ioc' => 'MAR', 'name' => 'Morocco', 'active' => 0];
        $countries[] = ['iso' => 'MZ', 'ioc' => 'MOZ', 'name' => 'Mozambique', 'active' => 0];
        $countries[] = ['iso' => 'MM', 'ioc' => 'MYA', 'name' => 'Myanmar', 'active' => 0];
        $countries[] = ['iso' => 'NA', 'ioc' => 'NAM', 'name' => 'Namibia', 'active' => 0];
        $countries[] = ['iso' => 'NR', 'ioc' => 'NRU', 'name' => 'Nauru', 'active' => 0];
        $countries[] = ['iso' => 'NP', 'ioc' => 'NEP', 'name' => 'Nepal', 'active' => 0];
        $countries[] = ['iso' => 'NL', 'ioc' => 'NED', 'name' => 'Netherlands', 'active' => 0];
        $countries[] = ['iso' => 'AN', 'ioc' => 'AHO', 'name' => 'Netherlands Antilles', 'active' => 0];
        $countries[] = ['iso' => 'NC', 'ioc' => null, 'name' => 'New Caledonia', 'active' => 0];
        $countries[] = ['iso' => 'NZ', 'ioc' => 'NZL', 'name' => 'New Zealand', 'active' => 0];
        $countries[] = ['iso' => 'NI', 'ioc' => 'NCA', 'name' => 'Nicaragua', 'active' => 0];
        $countries[] = ['iso' => 'NE', 'ioc' => 'NIG', 'name' => 'Niger', 'active' => 0];
        $countries[] = ['iso' => 'NG', 'ioc' => 'NGR', 'name' => 'Nigeria', 'active' => 0];
        $countries[] = ['iso' => 'NU', 'ioc' => null, 'name' => 'Niue', 'active' => 0];
        $countries[] = ['iso' => 'NF', 'ioc' => null, 'name' => 'Norfolk Island', 'active' => 0];
        $countries[] = ['iso' => 'MK', 'ioc' => 'MKD', 'name' => 'North Macedonia', 'active' => 0];
        $countries[] = ['iso' => 'MP', 'ioc' => null, 'name' => 'Northern Mariana Islands', 'active' => 0];
        $countries[] = ['iso' => 'NO', 'ioc' => 'NOR', 'name' => 'Norway', 'active' => 0];
        $countries[] = ['iso' => 'OM', 'ioc' => 'OMA', 'name' => 'Oman', 'active' => 0];
        $countries[] = ['iso' => 'PK', 'ioc' => 'PAK', 'name' => 'Pakistan', 'active' => 0];
        $countries[] = ['iso' => 'PW', 'ioc' => 'PLW', 'name' => 'Palau', 'active' => 0];
        $countries[] = ['iso' => 'PS', 'ioc' => null, 'name' => 'Palestinian Territory, Occupied', 'active' => 0];
        $countries[] = ['iso' => 'PA', 'ioc' => 'PAN', 'name' => 'Panama', 'active' => 0];
        $countries[] = ['iso' => 'PG', 'ioc' => 'PNG', 'name' => 'Papua New Guinea', 'active' => 0];
        $countries[] = ['iso' => 'PY', 'ioc' => 'PAR', 'name' => 'Paraguay', 'active' => 0];
        $countries[] = ['iso' => 'PE', 'ioc' => 'PER', 'name' => 'Peru', 'active' => 0];
        $countries[] = ['iso' => 'PH', 'ioc' => 'PHI', 'name' => 'Philippines', 'active' => 0];
        $countries[] = ['iso' => 'PN', 'ioc' => null, 'name' => 'Pitcairn Islands', 'active' => 0];
        $countries[] = ['iso' => 'PL', 'ioc' => 'POL', 'name' => 'Poland', 'active' => 0];
        $countries[] = ['iso' => 'PT', 'ioc' => 'POR', 'name' => 'Portugal', 'active' => 0];
        $countries[] = ['iso' => 'PR', 'ioc' => 'PUR', 'name' => 'Puerto Rico', 'active' => 0];
        $countries[] = ['iso' => 'QA', 'ioc' => 'QAT', 'name' => 'Qatar', 'active' => 0];
        $countries[] = ['iso' => 'RE', 'ioc' => null, 'name' => 'Reunion', 'active' => 0];
        $countries[] = ['iso' => 'RO', 'ioc' => 'ROU', 'name' => 'Romania', 'active' => 0];
        $countries[] = ['iso' => 'RU', 'ioc' => 'RUS', 'name' => 'Russia', 'active' => 0];
        $countries[] = ['iso' => 'RW', 'ioc' => 'RWA', 'name' => 'Rwanda', 'active' => 0];
        $countries[] = ['iso' => 'SH', 'ioc' => null, 'name' => 'Saint Helena', 'active' => 0];
        $countries[] = ['iso' => 'KN', 'ioc' => 'SKN', 'name' => 'Saint Kitts and Nevis', 'active' => 0];
        $countries[] = ['iso' => 'LC', 'ioc' => 'LCA', 'name' => 'Saint Lucia', 'active' => 0];
        $countries[] = ['iso' => 'PM', 'ioc' => null, 'name' => 'Saint Pierre and Miquelon', 'active' => 0];
        $countries[] = ['iso' => 'VC', 'ioc' => 'VIN', 'name' => 'Saint Vincent and the Grenadines', 'active' => 0];
        $countries[] = ['iso' => 'WS', 'ioc' => 'SAM', 'name' => 'Samoa', 'active' => 0];
        $countries[] = ['iso' => 'SM', 'ioc' => 'SMR', 'name' => 'San Marino', 'active' => 0];
        $countries[] = ['iso' => 'ST', 'ioc' => null, 'name' => 'Sao Tome and Principe', 'active' => 0];
        $countries[] = ['iso' => 'SA', 'ioc' => 'KSA', 'name' => 'Saudia Arabia', 'active' => 0];
        $countries[] = ['iso' => 'SN', 'ioc' => 'SEN', 'name' => 'Senegal', 'active' => 0];
        $countries[] = ['iso' => 'RS', 'ioc' => 'SRB', 'name' => 'Serbia', 'active' => 0];
        $countries[] = ['iso' => 'SC', 'ioc' => 'SEY', 'name' => 'Seychelles', 'active' => 0];
        $countries[] = ['iso' => 'SL', 'ioc' => 'SLE', 'name' => 'Sierra Leone', 'active' => 0];
        $countries[] = ['iso' => 'SG', 'ioc' => 'SGP', 'name' => 'Singapore', 'active' => 0];
        $countries[] = ['iso' => 'SK', 'ioc' => 'SVK', 'name' => 'Slovakia', 'active' => 0];
        $countries[] = ['iso' => 'SI', 'ioc' => 'SLO', 'name' => 'Slovenia', 'active' => 0];
        $countries[] = ['iso' => 'SB', 'ioc' => 'SOL', 'name' => 'Solomon Islands', 'active' => 0];
        $countries[] = ['iso' => 'SO', 'ioc' => 'SOM', 'name' => 'Somalia', 'active' => 0];
        $countries[] = ['iso' => 'ZA', 'ioc' => 'RSA', 'name' => 'South Africa', 'active' => 0];
        $countries[] = ['iso' => 'GS', 'ioc' => null, 'name' => 'South Georgia and the South Sandwich Islands', 'active' => 0];
        $countries[] = ['iso' => 'ES', 'ioc' => 'ESP', 'name' => 'Spain', 'active' => 0];
        $countries[] = ['iso' => 'LK', 'ioc' => 'SRI', 'name' => 'Sri Lanka', 'active' => 0];
        $countries[] = ['iso' => 'SD', 'ioc' => 'SUD', 'name' => 'Sudan', 'active' => 0];
        $countries[] = ['iso' => 'SR', 'ioc' => 'SUR', 'name' => 'Surinam', 'active' => 0];
        $countries[] = ['iso' => 'SJ', 'ioc' => null, 'name' => 'Svalbard and Jan Mayen', 'active' => 0];
        $countries[] = ['iso' => 'SZ', 'ioc' => 'SWZ', 'name' => 'Swaziland', 'active' => 0];
        $countries[] = ['iso' => 'SE', 'ioc' => 'SWE', 'name' => 'Sweden', 'active' => 0];
        $countries[] = ['iso' => 'CH', 'ioc' => 'SUI', 'name' => 'Switzerland', 'active' => 0];
        $countries[] = ['iso' => 'SY', 'ioc' => 'SYR', 'name' => 'Syria', 'active' => 0];
        $countries[] = ['iso' => 'TW', 'ioc' => 'TPE', 'name' => 'Taiwan, Province of China', 'active' => 0];
        $countries[] = ['iso' => 'TJ', 'ioc' => 'TJK', 'name' => 'Tajikistan', 'active' => 0];
        $countries[] = ['iso' => 'TZ', 'ioc' => 'TAN', 'name' => 'Tanzania, United Republic of', 'active' => 0];
        $countries[] = ['iso' => 'TH', 'ioc' => 'THA', 'name' => 'Thailand', 'active' => 0];
        $countries[] = ['iso' => 'TL', 'ioc' => 'TLS', 'name' => 'East Timor', 'active' => 0];
        $countries[] = ['iso' => 'TG', 'ioc' => 'TOG', 'name' => 'Togo', 'active' => 0];
        $countries[] = ['iso' => 'TK', 'ioc' => null, 'name' => 'Tokelau', 'active' => 0];
        $countries[] = ['iso' => 'TO', 'ioc' => 'TGA', 'name' => 'Tonga', 'active' => 0];
        $countries[] = ['iso' => 'TT', 'ioc' => 'TTO', 'name' => 'Trinidad and Tobago', 'active' => 0];
        $countries[] = ['iso' => 'TN', 'ioc' => 'TUN', 'name' => 'Tunesia', 'active' => 0];
        $countries[] = ['iso' => 'TR', 'ioc' => 'TUR', 'name' => 'Turkey', 'active' => 0];
        $countries[] = ['iso' => 'TM', 'ioc' => 'TKM', 'name' => 'Turkmenistan', 'active' => 0];
        $countries[] = ['iso' => 'TC', 'ioc' => null, 'name' => 'Turks and Caicos Islands', 'active' => 0];
        $countries[] = ['iso' => 'TV', 'ioc' => 'TUV', 'name' => 'Tuvalu', 'active' => 0];
        $countries[] = ['iso' => 'UG', 'ioc' => 'UGA', 'name' => 'Uganda', 'active' => 0];
        $countries[] = ['iso' => 'UA', 'ioc' => 'UKR', 'name' => 'Ukraine', 'active' => 0];
        $countries[] = ['iso' => 'AE', 'ioc' => 'UAE', 'name' => 'United Arab Emirates', 'active' => 0];
        $countries[] = ['iso' => 'GB', 'ioc' => 'GBR', 'name' => 'United Kingdom', 'active' => 0];
        $countries[] = ['iso' => 'US', 'ioc' => 'USA', 'name' => 'United States', 'active' => 0];
        $countries[] = ['iso' => 'UM', 'ioc' => null, 'name' => 'United States Minor Outlying Islands', 'active' => 0];
        $countries[] = ['iso' => 'UY', 'ioc' => 'URU', 'name' => 'Uruguay', 'active' => 0];
        $countries[] = ['iso' => 'UZ', 'ioc' => 'UZB', 'name' => 'Uzbekistan', 'active' => 0];
        $countries[] = ['iso' => 'VU', 'ioc' => 'VAN', 'name' => 'Vanuatu', 'active' => 0];
        $countries[] = ['iso' => 'VE', 'ioc' => 'VEN', 'name' => 'Venezuela', 'active' => 0];
        $countries[] = ['iso' => 'VN', 'ioc' => 'VIE', 'name' => 'Vietnam', 'active' => 0];
        $countries[] = ['iso' => 'VG', 'ioc' => 'IVB', 'name' => 'Virgin Islands, British', 'active' => 0];
        $countries[] = ['iso' => 'VI', 'ioc' => 'ISV', 'name' => 'Virgin Islands, U.S.', 'active' => 0];
        $countries[] = ['iso' => 'WF', 'ioc' => null, 'name' => 'Wallis and Futuna', 'active' => 0];
        $countries[] = ['iso' => 'EH', 'ioc' => null, 'name' => 'Western Sahara', 'active' => 0];
        $countries[] = ['iso' => 'YE', 'ioc' => 'YEM', 'name' => 'Yemen', 'active' => 0];
        $countries[] = ['iso' => 'ZM', 'ioc' => 'ZAM', 'name' => 'Zambia', 'active' => 0];
        $countries[] = ['iso' => 'ZW', 'ioc' => 'ZIM', 'name' => 'Zimbabwe', 'active' => 0];

        foreach ($countries as $id => $country) {
            $countries[$id] = array_merge($country, ['created_at' => $createdAt, 'updated_at' => $createdAt]);
        }

        $tableNames = config('localisation.table_names');

        DB::table($tableNames['countries'])->insert($countries);
    }
}
