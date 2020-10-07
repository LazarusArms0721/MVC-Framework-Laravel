<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Role\UserRoleChecker;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    protected $userRoleChecker;

    public function __construct(UserRoleChecker $userRoleChecker){
        $this->userRoleChecker = $userRoleChecker;
    }

    public function handle($request, Closure $next, $role){
        $user = Auth::guard()->user();

        if (!$this->userRoleChecker->check($user, $role)){
                throw new AuthorizationException('You do not have permission to view this page OSMANNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN');

        }

        return $next($request);
    }
}
