<?php

namespace App\Providers;

use App\Services\CompanyService;
use App\Services\InvoiceService;
use App\Services\ProductService;
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
        $this->app->bind(InvoiceService::class, function ($app) {
            return new InvoiceService();
        });
        $this->app->bind(CompanyService::class, function ($app) {
            return new CompanyService();
        });
        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}