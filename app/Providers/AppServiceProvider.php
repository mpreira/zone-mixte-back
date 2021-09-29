<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Repositories\Comment\CommentRepository::class, Repositories\Comment\EloquentComment::class);
        $this->app->singleton(Repositories\User\UserRepository::class, Repositories\User\EloquentUser::class);
        $this->app->singleton(Repositories\Role\RoleRepository::class, Repositories\Role\EloquentRole::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
