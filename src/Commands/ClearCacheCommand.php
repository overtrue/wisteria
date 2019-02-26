<?php

namespace Overtrue\Wisteria\Commands;

use Illuminate\Console\Command;
use Overtrue\Wisteria\WisteriaServiceProvider;

class ClearCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wisteria:clear-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Wisteria cached contents.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Wisteria cache cleared.');
    }
}
