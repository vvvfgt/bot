<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\GroupService;
use App\Service\ProductService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    public function __construct(
        private CategoryService $categoryService,
        private ProductService $productService,
        private GroupService $groupService,
    ) {}

    public function getGroups(): JsonResponse
    {
        return response()
            ->json(
                $this->groupService->allGroups(),
                Response::HTTP_OK
            );
    }

    public function getCategories(int $groupId): JsonResponse
    {
        return response()
            ->json([
                $this->categoryService
                    ->groupCategories($groupId),
                Response::HTTP_OK
            ]);
    }

    public function getRandomProduct(): JsonResponse
    {
        return response()
            ->json([
                $this->productService
                    ->randomProduct(),
                Response::HTTP_OK
            ]);
    }

    public function getCategoryProducts(int $category): JsonResponse
    {
        return response()
            ->json([
                $this->productService
                    ->categoryProducts($category),
                Response::HTTP_OK
            ]);
    }
}
