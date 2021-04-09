<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('backend-home',function ($user){

            return $user->checkAccess();
        });

        Gate::define('product-list',function ($user){

            return $user->checkAccessUser();
        });

        Gate::define('product-create',function ($user){

            return $user->checkAccessDev();
        });

        Gate::define('product-store',function ($user){

            return $user->checkAccessDev();
        });

        Gate::define('product-edit',function ($user){

            return $user->checkAccessDev();
        });

        Gate::define('product-update',function ($user){

            return $user->checkAccessDev();
        });

        Gate::define('product-delete',function ($user){

            return $user->checkAccessAdmin();
        });

        Gate::define('categories-list',function ($user){

            return $user->checkAccessUser();
        });

        Gate::define('categories-create',function ($user){

            return $user->checkAccessDev();
        });

        Gate::define('can:categories-store',function ($user){

            return $user->checkAccessDev();
        });


        Gate::define('can:categories-delete',function ($user){

            return $user->checkAccessDev();
        });

        Gate::define('users-list',function ($user){

            return $user->checkAccessDev();
        });

        Gate::define('users-create',function ($user){

            return $user->checkAccessAdmin();
        });


        Gate::define('users-store',function ($user){

            return $user->checkAccessAdmin();
        });

        Gate::define('users-edit',function ($user){

            return $user->checkAccessAdmin();
        });


        Gate::define('users-update',function ($user){

            return $user->checkAccessAdmin();
        });

        Gate::define('users-delete',function ($user){

            return $user->checkAccessAdmin();
        });

        Gate::define('bills-list',function ($user){

            return $user->checkAccessUser();
        });

        Gate::define('bills-edit',function ($user){

            return $user->checkAccessDev();
        });

        Gate::define('bills-update',function ($user){

            return $user->checkAccessDev();
        });

        Gate::define('bills-index',function ($user){

            return $user->checkAccessUser();
        });


    }
}
