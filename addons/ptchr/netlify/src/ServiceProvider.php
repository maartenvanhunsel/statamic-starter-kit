<?php

namespace Ptchr\Netlify;

use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;

use Ptchr\Netlify\Policies\AddonPolicy;

use Statamic\Facades\Permission;

class ServiceProvider extends AddonServiceProvider
{
    // protected $publishAfterInstall = false;

    protected $routes = [
        'cp' => __DIR__ . '/../routes/cp.php',
    ];

    protected $scripts = [
        __DIR__.'/../resources/dist/js/cp.js',
    ];

    // protected $policies = [
    //     Order::class => AddonPolicy::class
    // ];

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'netlify');
        $this->mergeConfigFrom(__DIR__ . '/../config/addon.php', 'config');

        $this->bootPermissions();
        $this->bootNavigation();
    }

    protected function bootPermissions(): void
    {
        $this->app->booted(function () {
            Permission::group('addons', 'Addons', function () {
                Permission::register('netlify', function ($permission) {
                    $permission
                        ->label('Netlify')
                        ->description('Netlify addon')
                        ->children([
                            Permission::make('show settings')
                                ->label('Settings')
                        ]);
                });
            });

        });
    }

    private function bootNavigation(): void
    {
        Nav::extend(function ($nav) {
            $nav->create('Netlify')
                ->icon('earth')
                ->section('Tools')
                ->route('netlify.index')
                ->can('netlify')
                ->children([
                    $nav->item('Settings')->route('netlify.settings'),
                    //     $nav->item(__('oh-dear::lang.broken_links'))->route('oh-dear.broken-links'),
                    //     $nav->item(__('oh-dear::lang.mixed_content'))->route('oh-dear.mixed-content'),
                    //     $nav->item(__('oh-dear::lang.certificate_health'))->route('oh-dear.certificate-health'),
                ]);
        });
    }
}
