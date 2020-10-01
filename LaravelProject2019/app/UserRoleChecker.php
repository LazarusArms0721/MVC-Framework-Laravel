<?php

namespace App\Role;


use App\User;

class UserRoleChecker
{

    public function check(User $user, $role){
        if ($user->hasRole(UserRole::ROLE_ADMIN)) {
            return true;
        }
        else if ($user->hasRole(UserRole::ROLE_SUPPORT)){
            return true;
        }

        return $user->hasRole($role);
    }


}