<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class TrackActiveUsers
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && !Session::has('user_logged_in')) {
            // Increment the count only if the user is authenticated and the login session flag is not set
            $activeUsersCount = Cache::get('active_users_count', 0);
            $activeUsersCount++;
            Cache::put('active_users_count', $activeUsersCount);

            // Set the login session flag to prevent incrementing on subsequent requests
            Session::put('user_logged_in', true);
        }

        return $next($request);
    }
}
