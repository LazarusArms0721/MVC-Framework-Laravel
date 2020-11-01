<?php

namespace App\Role;


use App\User;

class Userrolechecker
{

    public function check(User $user, $role){
        if ($user->hasRole(Userrole::ROLE_ADMIN)) {
            return true;
        }
        else if ($user->hasRole(Userrole::ROLE_MANAGEMENT)){
            $managementRoles =
                Userrole::getAllowedRoles(Userrole::ROLE_MANAGEMENT);

            if (in_array($role, $managementRoles)){
                return true;
            }
        }

        return $user->hasRole($role);
    }


}