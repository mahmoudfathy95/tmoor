<?php

namespace Modules\ProductModule\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;
    protected $fillable = ['category_id','measurement_id','price','quantity','image','imgs','number','vat'];
    public $translationModel = ProductTranslation::class;
    public $translatedAttributes = ['name','description'];

    public function measurementUnit()
    {
        return $this->belongsTo(Measurement::class,'measurement_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'product_id')->select('id','name','comment','review');
    }

    public function discount()
    {
        return $this->hasOne(Discount::class,'product_id');
    }
}
