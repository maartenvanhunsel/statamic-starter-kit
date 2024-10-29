<?php

namespace App\Providers;

use App\CustomAsset;
use App\CustomEntry;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Statamic\Contracts\Assets\Asset;
use Statamic\Contracts\Entries\Entry;
use Statamic\Statamic;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // if ($this->app->environment('local')) {
        //     $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        //     $this->app->register(TelescopeServiceProvider::class);
        // }
    }

    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->app->bind(Asset::class, CustomAsset::class);
        $this->app->bind(Entry::class, CustomEntry::class);

        Statamic::vite('app', ['resources/js/cp.js', 'resources/css/cp.css']);

        // Return resolved relations within globals, see https://github.com/statamic/cms/pull/8555.
        // Should be removed when statamic:5.x is out.
        // \Statamic\Http\Resources\API\GlobalSetResource::withRelations();

        // Make the group fieldtype selectable in forms.
        // \Statamic\Fieldtypes\Group::makeSelectableInForms();
    }
}

