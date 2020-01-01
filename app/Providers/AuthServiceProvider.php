<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Route;
use Laravel\Passport\Passport;
use Illuminate\Support\Carbon;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
 //       Passport::routes();
//         Middleware `oauth.providers` middleware defined on $routeMiddleware above
        Route::group(['middleware' => 'oauth.providers'], function () {
            Passport::routes(function ($router) {
                Passport::tokensExpireIn(Carbon::now()->addMinutes(5)); //token令牌有效期 （分钟）
                Passport::refreshTokensExpireIn(Carbon::now()->addDays(30)); //刷新令牌有效期（天）
                return $router->forAccessTokens();
            });
        });


    }
}
