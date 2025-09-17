<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\AdminAuth\AdminUserRepository;
use App\Repositories\AdminAuth\AdminUserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminUserRepositoryInterface::class, AdminUserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
