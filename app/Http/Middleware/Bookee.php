<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class Bookee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentUser = auth()->user();

        if (User::ROLE_BOOKEE != $currentUser->role) {
            return abort(404);
        }

        return $next($request);
    }
}
