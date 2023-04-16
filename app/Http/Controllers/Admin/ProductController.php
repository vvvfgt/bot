<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRestore;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\Product;
use App\Models\Admin\Tag;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();

        return view('admin.product.create', compact('tags', 'colors', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        ProductService::storeProduct($request);

        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();

        return view('admin.product.edit',
            compact('product', 'tags', 'colors', 'categories')
        );
    }

    public function update(UpdateRestore $request, Product $product)
    {
        ProductService::updateProduct($request, $product);

        return view('admin.product.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }

    public function updatePreviewImage(Request $request, Product $product)
    {
       if (!empty($request['preview_image_new'])) {
           ProductService::updatePreviewImage($request['preview_image_new'], $product);
       }

        return redirect()->route('product.show', $product);
    }

    public function updateProductImages(Request $request, Product $product)
    {
        ProductService::updateProductImages($request['product_images_new'], $product);

        return redirect()->route('product.show', $product);
    }
}
