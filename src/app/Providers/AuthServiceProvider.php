<?php

namespace App\Providers;

use App\Models\Ticket;
use App\Models\Comment;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Admin;

use Carbon\CarbonInterval;

use App\Policies\TicketPolicy;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Auth;


use Laravel\Passport\Guards\TokenGuard;
use League\OAuth2\Server\ResourceServer;

use Laravel\Passport\TokenRepository;
use Laravel\Passport\ClientRepository;
use Illuminate\Contracts\Encryption\Encrypter;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Ticket::class => TicketPolicy::class,
        \App\Models\Comment::class => \App\Policies\CommentPolicy::class,
    ];
    
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::tokensExpireIn(CarbonInterval::days(15));
        Passport::refreshTokensExpireIn(CarbonInterval::days(30));
        Passport::personalAccessTokensExpireIn(CarbonInterval::months(6));

        Passport::enablePasswordGrant();

        
    }
}

