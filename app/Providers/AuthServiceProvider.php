<?php

namespace App\Providers;

use App\Article;
use App\Image;
use App\Page;
use App\Policies\ArticlePolicy;
use App\Policies\ImagePolicy;
use App\Policies\PagePolicy;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Page::class => PagePolicy::class,
        Image::class => ImagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-side', function (User $user) {
            return $user->role !== User::ROLE_USER;
        });
    }
}
