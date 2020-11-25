<?php

namespace Modules\ProductModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\ProductModule\Transformers\ProductResource;
use Modules\ProductModule\Transformers\ProductSimpleResource;
use Modules\ProductModule\Entities\Comment;
use Modules\ProductModule\Entities\Coupon;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    use ApiResponseHelper;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function find($id)
    {
        try {
            $product = $this->productRepository->find($id);
            $product = ProductResource::make($product);
            return $this->setCode(200)->setData($product)->send();
        } catch (\Exception $e) {
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }

    public function recentlyAdded()
    {
        try {

            $product = $this->productRepository->recentlyAdded();
            $product = ProductSimpleResource::collection($product);
            return $this->setCode(200)->setData($product)->send();
        } catch (\Exception $e) {
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }

    public function mostPaid()
    {
        try {
            $product = $this->productRepository->mostPaid();
            $product = ProductSimpleResource::collection($product);
            return $this->setCode(200)->setData($product)->send();
        } catch (\Exception $e) {
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }

    public function filter(Request $request)
    {


        try {
            $data = $request->only('price_from', 'price_to', 'name', 'details');
            $products = $this->productRepository->filter($data);
            $products = ProductSimpleResource::collection($products);
            return $this->setCode(200)->setData($products)->send();
        } catch (\Exception $e) {
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }

    public function comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'name' => 'required|string|max:255',
            'comment' => 'required',
            'review' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $this->setCode(400)->setError($validator->errors()->first())->send();
        }

        $data = $request->only('product_id', 'name', 'comment', 'review');
        Comment::create($data);
        return $this->setCode(200)->setSuccess(__('adminmodule::admin.success'))->send();
    }


    public function checkCoupon($code)
    {
        $dt = date('Y-m-d');
        $coupon = Coupon::select('code', 'value', 'type', 'date_from AS from', 'date_to AS to')->where('date_from', '<=', $dt)->where('date_to', '>=', $dt)->where('code', $code)->first();
        if (!empty($coupon)) {
            return $this->setCode(200)->setData($coupon)->send();
        } else {
            return $this->setCode(400)->setError(__('adminmodule::admin.coupon_not_valid'))->send();
        }
    }
}
