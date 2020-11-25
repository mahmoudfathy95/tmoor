<?php

namespace Modules\ProductModule\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Entities\Offer;
use Modules\ProductModule\Transformers\OffersResource;
use Modules\ProductModule\Transformers\OfferResource;
use Modules\CommonModule\Helper\ApiResponseHelper;

class OfferApiController extends Controller
{
    use ApiResponseHelper;
    public function getOffers()
    {
        try {
         
            $offers = Offer::all();
            $offers = OffersResource::collection($offers);
            return $this->setCode(200)->setData($offers)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }

    public function offer($id)
    {
        try {
            $offer = Offer::find($id);
            $offer = OfferResource::make($offer);
            return $this->setCode(200)->setData($offer)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }
}
