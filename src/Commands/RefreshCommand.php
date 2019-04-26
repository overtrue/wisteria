<?php

/*
 * This file is part of the overtrue/wisteria.
 *
 * (c) overtrue <anzhengchao@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Overtrue\Wisteria\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wisteria:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync documents and flush the cache.';

    /**
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * @var array
     */
    protected $repository;

    /**
     * Create a new command instance.
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();

        $this->filesystem = $filesystem;
        $this->repository = config('wisteria.docs.repository');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!\config('wisteria.docs.repostory.url')) {
            $versions = config('wisteria.docs.versions');

            foreach ($versions as $version) {
                $this->updateOrCreateVersionDocs($version);
            }
        }

        $this->call('wisteria:clear-cache');
    }

    protected function updateOrCreateVersionDocs(string $version)
    {
        $versionDirectory = \sprintf('%s/%s', \base_path(config('wisteria.docs.path')), $version);
        $workDirectory = \base_path();

        $this->info(\sprintf('======== Working version: %s =======', $version));

        if (!$this->filesystem->exists($versionDirectory)) {
            $this->info('Cloning...');
            $command = \sprintf('git clone -b %s %s %s/%s', $version, $this->repository['url'], ltrim(\config('wisteria.docs.path'), '/'), $version);
        } else {
            $workDirectory = $versionDirectory;
            $this->info('Pulling...');
            $command = \sprintf('git reset --hard; git pull');
        }

        $process = new Process($command);
        $process->setWorkingDirectory($workDirectory);

        $this->info(\sprintf('> %s', $command));

        $process->enableOutput();

        $process->run();
    }
}
