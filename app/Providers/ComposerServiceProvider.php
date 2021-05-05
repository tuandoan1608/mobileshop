<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer( 
             'client.master',
        'App\Http\ViewComposer\categoryComposer');
        view()->composer( 
            'admin.master',
       'App\Http\ViewComposer\masterComposer');
    }
}
