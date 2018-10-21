<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CSVServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->bind(
			'csv',
			'App\Services\CSVService'
		);
    }
}
