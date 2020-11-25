<?php
namespace Modules\AdminModule\Repository;


use Spatie\Permission\Models\Permission;
use Modules\AdminModule\Entities\Permission as PermissionModel;

class PermissionRepository
{
    function findAll()
    {
        return Permission::all();
    }


    function store($data)
    {
        $show = $data;
        $show['name'] = 'show '.$data['title'];
        $create = $data;
        $create['name'] = 'create '.$data['title'];
        $update = $data;
        $update['name'] = 'update '.$data['title'];
        $delete = $data;
        $delete['name'] = 'delete '.$data['title'];

        Permission::create($show);
        Permission::create($create);
        Permission::create($update);
        Permission::create($delete);
    }


    function destroy($title)
    {

        if (PermissionModel::where('title',$title)->delete())
            return true;
        return false;
    }
}
