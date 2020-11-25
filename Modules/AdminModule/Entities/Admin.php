<?php

namespace Modules\AdminModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin  extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    protected $fillable = ['name','email','phone','password','status'];

    protected $guard_name = 'admin';
    protected $guard = 'admin';

    protected $hidden = [
           'password', 'remember_token',
       ];
}
