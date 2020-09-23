<?php

namespace App\Traits;

use App\Model\Permission;
use App\Model\Role;

trait HasRolesAndPermissions
{
    /**
     * Связываем таблицу users через промежуточную users_roles c таблицей roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /**
     * Связываем таблицу users через промежуточную users_permissions c таблицей permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    /**
     * Проверяем есть ли у пользователя роль по связи через промежуточную таблтцу
     * users -> users_roles -> roles
     */
    public function hasRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->roles->contains('slug', $role)) {
                    return true;
                }
            }
        }

        if ($this->roles->contains('slug', $roles)) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет права пользователя
     * есть ли у Пользователя Права напрямую или через Роль
     */
    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    /**
     *  Проверяем есль ли в ролял правела
     *  roles -> roles_permission -> permission
     */
    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains('slug', $role->slug)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Проверяет права пользователя  на прямую
     * через промежуточную таблицу users_permissions
     */
    public function hasPermission($permission): bool
    {
        return $this->permissions->contains('slug', $permission->slug);
    }

    public function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('slug', $permissions)->get();
    }

    public function givePermissionsTo($permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }

        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function deletePermissions($permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions($permissions)
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
}
