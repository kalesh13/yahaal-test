<?php

namespace App\Providers\app;

use App\Services\Users\User;
use App\Repository\Application;
use App\Repository\IApplication;
use Illuminate\Support\ServiceProvider;
use App\Services\FileReader\ICsvReader;
use App\Services\Filters\IFiltersManager;
use App\Services\FileReader\UserFileReader;
use Illuminate\Contracts\Support\DeferrableProvider;

class YahaalServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCsvReader();
        $this->registerAppRepository();
    }

    /**
     * Registers the application file reader.
     */
    protected function registerCsvReader()
    {
        $this->app->singleton(ICsvReader::class, function () {
            return new UserFileReader(storage_path('app/mock.txt'));
        });
    }

    /**
     * Registers the application repository class which acts as a layer between the
     * controller and the data.
     */
    protected function registerAppRepository()
    {
        $this->app->singleton(IApplication::class, function ($app) {
            return new Application(
                function ($data) {
                    return User::from($data);
                },
                $app->make(IFiltersManager::class),
                $app->make(ICsvReader::class),
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [IApplication::class, ICsvReader::class];
    }
}
