<?php

namespace PWWeb\Localisation\Commands;

use Illuminate\Console\Command;

use PWWeb\Localisation\LocalisationRegistrar;

class CacheReset extends Command
{
    protected $signature = 'pwweb:localisation:cache-reset';

    protected $description = 'Reset the localisation cache';

    public function handle()
    {
        if (app(LocalisationRegistrar::class)->forgetCachedLanguages()) {
            $this->info('Language cache flushed.');
        } else {
            $this->error('Unable to flush cache.');
        }
    }
}