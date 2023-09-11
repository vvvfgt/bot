<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilterController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $categories = Category::all();
        $tags = Tag::all();
        $minPrice= Product::query()->min('price');
        $maxPrice = Product::query()->max('price');

        $result = [
            'categories' => $categories,
            'tags' => $tags,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice,
            ],
        ];

        return response()
            ->json(
                $result,
                Response::HTTP_OK
            );
    }
}
