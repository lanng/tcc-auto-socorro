<?php

namespace App\Role;

class UserRole
{
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_MANAGEMENT = 'ROLE_MANAGEMENT';
    const ROLE_DRIVER = 'ROLE_DRIVER';

    protected static array $roleHierarchy = [
        self::ROLE_ADMIN => ['*'],
        self::ROLE_MANAGEMENT => [
            self::ROLE_DRIVER
        ],
        self::ROLE_DRIVER => []
    ];

    public static function getAllowedRoles(string $role)
    {
        if (isset(self::$roleHierarchy[$role])){
            return self::$roleHierarchy[$role];
        }
        return [];
    }

    public static function getRoleList(): array
    {
        return [
            static::ROLE_ADMIN => 'Admin',
            static::ROLE_MANAGEMENT => 'Management',
            static::ROLE_DRIVER => 'Driver'
        ];
    }
}
