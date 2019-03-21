<?php

/*
 * This file is part of the overtrue/wisteria.
 *
 * (c) overtrue <anzhengchao@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Overtrue\Wisteria;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Overtrue\Wisteria\Commands\ClearCacheCommand;
use Overtrue\Wisteria\Commands\InstallCommand;
use Overtrue\Wisteria\Commands\RefreshCommand;
use Overtrue\Wisteria\Contracts\Renderer;
use Overtrue\Wisteria\Renders\Markdown;

/**
 * Class WisteriaServiceProvider.
 */
class WisteriaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        $this->registerConfig();
        $this->registerTranslations();
        $this->registerViews();
        $this->registerAssets();
        $this->registerCommands();
    }

    public function register()
    {
        $this->bindContracts();
        $this->mergeConfigFrom(
            __DIR__.'/../config/wisteria.php', 'wisteria'
        );
    }

    protected function registerRoutes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::namespace(__NAMESPACE__.'\Http\Controllers')
            ->group(function () {
                $route = config('wisteria.route', 'docs');

                Route::get($route, 'DocsController@index')->name('wisteria.docs.index');
                Route::get(\sprintf('%s/{version?}/{page?}', $route), 'DocsController@show')
                    ->name('wisteria.docs.show')
                    ->where('page', '[\w\-\/]+');
            });
    }

    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                RefreshCommand::class,
                ClearCacheCommand::class,
            ]);
        }
    }

    protected function registerAssets(): void
    {
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/wisteria'),
        ], ['wisteria-public', 'wisteria-assets']);
    }

    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'wisteria');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/wisteria'),
        ], 'wisteria-views');
    }

    protected function registerTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'wisteria');
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/wisteria'),
        ], 'wisteria-lang');
    }

    protected function registerConfig(): void
    {
        $this->publishes([
            __DIR__.'/../config/wisteria.php' => \config_path('wisteria.php'),
        ], 'wisteria-config');
    }

    public function bindContracts()
    {
        $this->app->bind(Renderer::class, Markdown::class);
    }
}
