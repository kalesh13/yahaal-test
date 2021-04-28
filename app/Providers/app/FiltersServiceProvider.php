<?php

namespace App\Providers\app;

use Illuminate\Support\ServiceProvider;
use App\Services\Filters\FiltersManager;
use App\Services\Filters\GenderFilter;
use App\Services\Filters\IFiltersManager;
use App\Services\Filters\LocationFilter;
use App\Services\Filters\NameFilter;
use Illuminate\Contracts\Support\DeferrableProvider;

class FiltersServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the filter manager service.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IFiltersManager::class, function () {
            return new FiltersManager();
        });
    }

    /**
     * Bootstrap the filter manager service by adding the necessary filters.
     *
     * @return void
     */
    public function boot()
    {
        $filtersManager = $this->app[IFiltersManager::class];

        $filtersManager->registerFilter('gender', function () {
            return new GenderFilter();
        });
        $filtersManager->registerFilter('name', function () {
            return new NameFilter();
        });
        $filtersManager->registerFilter('location', function () {
            return new LocationFilter();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [IFiltersManager::class];
    }
}
