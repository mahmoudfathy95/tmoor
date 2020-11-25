<?php

namespace Modules\ProductModule\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;
    protected $fillable = ['image'];
    public $translationModel = CategoryTranslation::class;
    public $translatedAttributes = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
