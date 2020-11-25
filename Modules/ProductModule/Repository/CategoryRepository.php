<?php
namespace Modules\ProductModule\Repository;

use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Entities\Product;

class CategoryRepository
{
    function getAll()
    {
        return Category::all();
    }

    function getCategoryProducts($id)
    {
        return Product::where('category_id',$id)->with('measurementUnit')->get();
    }
}
