<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\AdminAuth\AdminUserRepository;
use App\Repositories\AdminAuth\AdminUserRepositoryInterface;
use App\Repositories\HeroSlider\SliderRepository;
use App\Repositories\HeroSlider\SliderRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminUserRepositoryInterface::class, AdminUserRepository::class);
        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
