<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\ProductRequest;
use App\Http\Resources\Admin\IndexProductResource;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(ProductRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $products = Product::filter($filter)->get();
        return IndexProductResource::collection($products);
    }
}
