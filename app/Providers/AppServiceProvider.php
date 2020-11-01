<?php

namespace App\Providers;

use App\Contact;
use App\Http\Middleware\CheckUserRole;
use App\Observers\ContactObserver;
use App\Role\UserRoleChecker;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{



    /**
     * Register any application services.
     *
     * @return void
     */




    public function register()
    {
        $this->app->singleton(CheckUserRole::class, function(Application $app) {
            return new CheckUserRole(
                $app->make(UserRoleChecker::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Contact::observe(ContactObserver::class);
    }
}
