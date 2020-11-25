<?php
namespace Modules\AdminModule\Repository;

use Spatie\Permission\Models\Role;

class RoleRepository
{
    function getRoles()
    {
        return Role::all();
    }

    function getRole($id)
    {
        return Role::where('id',$id)->with('permissions')->first();
    }
    function setRole($data)
    {
        $role_permissions = $data['permissions'];
        unset($data['permissions']);
        $role =  Role::create($data);
        $role->syncPermissions($role_permissions);
        return true;
    }

    function updateRole($id,$data)
    {
        $role_permissions = $data['permissions'];
        unset($data['permissions']);
        $role = Role::find($id);
        $role->update($data);
        $role->syncPermissions($role_permissions);
        return $role;
    }

    function deleteRole($id)
    {
        $role = Role::find($id);
        $this->unSetRolePermissions($role);
        $role->delete();
        return true;
    }

    function unSetRolePermissions($role)
    {
        if($role->permissions){
            if($role->revokePermissionTo($role->permissions)){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }

    }

    function assignPermission($id, $data)
    {
        $role = Role::find($id);
        $role->syncPermissions($data);
        return $role;
    }

    function removePermission($id, $permission)
    {
        $role = Role::find($id);
        $role->revokePermissionTo($permission);
        return $role;
    }
}
