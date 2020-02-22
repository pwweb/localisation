<?php

/**
 * PWWeb\Localisation\Commands
 *
 * Definition of the cache reset artisan command.
 *
 * @package   PWWeb\Localisation
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation\Commands;

use Illuminate\Console\Command;

use PWWeb\Localisation\LocalisationRegistrar;

class CacheReset extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'pwweb:localisation:cache-reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the localisation cache';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (app(LocalisationRegistrar::class)->forgetCachedLanguages() === true) {
            $this->info('Language cache flushed.');
        } else {
            $this->error('Unable to flush cache.');
        }
    }
}
