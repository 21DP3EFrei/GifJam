<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
// In AuthServiceProvider.php

public function boot()
{
    $this->registerPolicies();

    Gate::define('access-categories', function (User $user) {
        return $user->usertype === 'admin';
    });

    Gate::define('access-verification', function (User $user) {
        return $user->usertype === 'admin';
    });
}

}
