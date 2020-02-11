<?php

namespace App\Providers;

use App\Link;
use App\Policies\LinkPolicy;
use App\User;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Link::class => LinkPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user,$action,$params){
           if ($user->isAdmin()){
               if (isset($params[0]) && $params[0] instanceof Link){
                   switch ($action){
                       case 'delete':
                       case 'edit':
                       case 'changeCondition':
                           return true;
                   }
               }
           }
        });

        //
    }
}
