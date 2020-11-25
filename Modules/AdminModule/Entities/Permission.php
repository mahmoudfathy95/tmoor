<?php

namespace Modules\AdminModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name','title','guard_name'];
}
