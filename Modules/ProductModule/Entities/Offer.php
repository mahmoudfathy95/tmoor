<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
class Offer extends Model
{
    use Translatable;
    protected $fillable = ['price','image','date_from','date_to'];

    public $translationModel = OfferTranslation::class;
    public $translatedAttributes = ['name','description'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'offer_products','offer_id','product_id');
    }
}
