<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Gate::define('view-dashboard', function (User $user) {
            return $user->role === 'admin'; // Only admins can access dashboard
        });
    }

    protected $policies = [
        Post::class => PostPolicy::class,
    ];
}
