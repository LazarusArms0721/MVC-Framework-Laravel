<?php


namespace App\Role;




class UserRole
{

    const ROLE_ADMIN ='ROLE_ADMIN';
    const ROLE_SUPPORT = 'ROLE_SUPPORT';

    protected static $roleHierarchy = [
        self::ROLE_ADMIN => ['*'],
        self::ROLE_SUPPORT => []

    ];

    public static function getAllowedRoles($role){

        if (isset(self::$roleHierarchy[$role])) {
            return self::$roleHierarchy[$role];
        }

        return [];
    }

    public static function getRoleList(){

        return [
            static::ROLE_ADMIN => 'Admin',
            static::ROLE_SUPPORT => 'Support',
        ];
    }

}