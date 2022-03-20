<?php

namespace App\Providers;

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
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            Asset::class,
            CustomAsset::class
        );
        $this->app->bind(
            Entry::class,
            CustomEntry::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Statamic::script('app', 'cp');
        // Statamic::style('app', 'cp');
    }
}
