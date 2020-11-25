<?php
namespace Modules\ConfigModule\Repository;

use Modules\ConfigModule\Entities\Config;

class ConfigRepository
{
    function getConfigWhereKey($key)
    {
        return Config::where('key',$key)->first();
    }

    function getConfigsByCategory($id)
    {
        return Config::where('config_category_id',$id)->get();
    }
}
