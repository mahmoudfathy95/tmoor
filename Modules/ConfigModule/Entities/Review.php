<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name','review','comment'];
}
