<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\BlogPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('blog-edit', [BlogPolicy::class, 'blog_edit']);


        ////////  Use Gates

        // Gate::define('update-blog', [BlogPolicy::class, 'update_blog']);

        //////////////////////////

        // Gate::define('isAdmin',function(User $user){
        //     return $user->is_admin === '1';
        // });


    }
}
