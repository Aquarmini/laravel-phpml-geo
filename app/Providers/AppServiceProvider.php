<?php

namespace App\Providers;

use App\PoiDistrictService;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Container::getInstance()->singleton(PoiDistrictService::class, function ($app) {
            return new PoiDistrictService($app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
