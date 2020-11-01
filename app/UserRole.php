<?php


namespace App\role;




class UserRole
{

    const ROLE_ADMIN ='ROLE_ADMIN';
    const ROLE_MANAGEMENT = 'ROLE_MANAGEMENT';
    const ROLE_EDITOR = 'ROLE_EDITOR';
    const ROLE_CREATOR = 'ROLE_CREATOR';
    const ROLE_SUPPORT = 'ROLE_SUPPORT';

    protected static $roleHierarchy = [
        self::ROLE_ADMIN => ['*'],
        self::ROLE_MANAGEMENT => [
            self::ROLE_EDITOR,
            self::ROLE_CREATOR,
            self::ROLE_SUPPORT,

        ],

        self::ROLE_EDITOR => [
            self::ROLE_SUPPORT
        ],

        self::ROLE_CREATOR => [
            self::ROLE_SUPPORT
        ],

        self::ROLE_SUPPORT => []

    ];

    public static function getAllowedRoles(string $role){

        if (isset(self::$roleHierarchy[$role])) {
            return self::$roleHierarchy[$role];
        }

        return [];
    }

    public static function getRoleList(){

        return [
            static::ROLE_ADMIN => 'Admin',
            static::ROLE_MANAGEMENT => 'Management',
            static::ROLE_EDITOR => 'Editor',
            static::ROLE_CREATOR => 'Creator',
            static::ROLE_SUPPORT => 'Support',
        ];
    }

}