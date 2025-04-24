<?php

namespace Omnilabs\VaderBilling;

use Illuminate\Support\ServiceProvider;

class VaderBillingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish migration
        $this->publishes([
            __DIR__.'/../database/migrations/2025_04_24_000000_create_vader_billing_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_vader_billing_table.php'),
        ], 'migrations');

        // Publish views
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/vader-billing'),
        ], 'views');

        // Register blade component
        \Illuminate\Support\Facades\Blade::component('vader-billing-modal', \Omnilabs\VaderBilling\View\Components\VaderBillingModal::class);
    }

    public function register()
    {
        // Bind service
        $this->app->singleton('vaderbilling', function ($app) {
            return new Services\VaderBillingService();
        });
    }
}
