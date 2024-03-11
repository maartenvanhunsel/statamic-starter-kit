<?php

namespace App\Providers;

use App\CustomAsset;
use App\CustomEntry;

use Illuminate\Support\ServiceProvider;
use Statamic\Contracts\Assets\Asset;
use Statamic\Contracts\Entries\Entry;
use Statamic\Statamic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(Asset::class, CustomAsset::class);
        $this->app->bind(Entry::class, CustomEntry::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Statamic::vite('app', [
            'resources/js/cp.js',
            'resources/css/cp.css'
        ]);
    }
}
