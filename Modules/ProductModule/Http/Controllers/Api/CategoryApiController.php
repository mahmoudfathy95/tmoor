<?php

namespace Modules\ProductModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductModule\Repository\CategoryRepository;
use Modules\ProductModule\Transformers\CategoryResource;
use Modules\ProductModule\Transformers\ProductSimpleResource;

class CategoryApiController extends Controller
{
    use ApiResponseHelper;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories()
    {
        
        try {
            $categories = $this->categoryRepository->getAll();
            $categories = CategoryResource::collection($categories);
            
            return $this->setCode(200)->setData($categories)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }

    public function getCategoryProducts($id)
    {
        try {
            $products = $this->categoryRepository->getCategoryProducts($id);
            $products = ProductSimpleResource::collection($products);
            return $this->setCode(200)->setData($products)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }
}
