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
        Gate::define('access-staff-area', function ($user) {
            return $user->role === 'staff';
        });

        Gate::define('isStaff', function ($user) {
            return $user->hasRole('staff');
        });
        Gate::define('isAdmin', function ($user) {
            return $user->hasRole('admin');
        });
        Gate::define('isPublicOrTech', function ($user = null) {
            return $user === null || $user->hasRole('technician');
        });
    }
}
