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
use Illuminate\Support\Facades\File;

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
            // Hack - Ideally the file path should be read from the 
            // .env file
            $filePath = env('DATA_FILE_PATH');

            if (!File::exists($filePath) || !File::isReadable($filePath)) {
                $filePath = storage_path('app/mock.txt');
            }
            // Hack ends. Replace the parameter with env('DATA_FILE_PATH')
            // after setting the correct path to the data file.
            return new UserFileReader($filePath);
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
