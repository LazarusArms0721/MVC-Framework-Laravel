<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Role\Userrolechecker;
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

    public function __construct(Userrolechecker $userRoleChecker){
        $this->userRoleChecker = $userRoleChecker;
    }

    public function handle($request, Closure $next, $role){
        $user = Auth::guard()->user();

        if (!$this->userRoleChecker->check($user, $role)){
                throw new AuthorizationException('You do not have permission to view this page');

        }

        return $next($request);
    }
}
