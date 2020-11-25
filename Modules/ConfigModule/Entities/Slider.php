<?php

namespace Modules\ConfigModule\Entities;

use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Entities\Product;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Translatable;
    protected $fillable = ['type','cat_type','image','cat_id'];

    public $translationModel = SliderTranslation::class;
    public $translatedAttributes = ['name'];


    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'cat_id');
    }
}
