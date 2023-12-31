<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('cuenta-login', function($cuenta){
            return $cuenta->perfil_id == 2; // Artista
        });
        Gate::define('admin-login', function($cuenta){
            return $cuenta->perfil_id == 1 ; // Admin
        });
    }
}
