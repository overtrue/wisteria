<?php

namespace Overtrue\Wisteria\Commands;

use Illuminate\Console\Command;
use Overtrue\Wisteria\WisteriaServiceProvider;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wisteria:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Wisteria and publish the required files.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('vendor:publish', ['--provider' => WisteriaServiceProvider::class, '--tag' => ['wisteria-public', 'wisteria-config']]);

        $this->line('Setup initial documentations structure under '.config('wisteria.docs.path').'...');

        $this->call('wisteria:refresh');

        $this->info('Wisteria successfully installed! Enjoy 😍');

        $this->info('Visit /docs in your browser 👻');
    }
}
