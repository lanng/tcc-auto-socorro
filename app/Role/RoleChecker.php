<?php

namespace App\Role;

use App\Models\User;

class RoleChecker
{
    public function check(User $user, string $role)
    {
        if ($user->hasRole(UserRole::ROLE_ADMIN)){
            return true;
        }
        else if ($user->hasRole(UserRole::ROLE_MANAGEMENT)){
            $managementRoles = UserRole::getAllowedRoles(UserRole::ROLE_MANAGEMENT);

            if (in_array($role, $managementRoles)){
                return true;
            }
        }

        return $user->hasRole($role);
    }
}
