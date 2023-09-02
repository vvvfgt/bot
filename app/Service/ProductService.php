<?php

namespace App\Service;

use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRestore;
use App\Models\Admin\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public static function storeProduct(StoreRequest $request): void
    {
        $data = $request->validated();

        $productImages = $data['product_images'];

        if (!empty($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
        } else {
            $data['preview_image'] = '';
        }
        if (!empty($data['tags'])) {
            $tagIds = $data['tags'];
            unset($data['tags']);
        }
        if (!empty($data['colors'])) {
            $colorIds = ($data['colors']);
            unset($data['colors'], $data['colors']);
        }

        $product = Product::create($data);

        if (!empty($tagIds)) {
            $product->tags()->attach($tagIds);
        }

        if (!empty($colorIds)) {
            $product->colors()->attach($colorIds);
        }

        foreach ($productImages as $productImage) {
            $filePath = Storage::disk('public')->put('/image', $productImage);
            $product->productImages()->create([
                'file_path' => $filePath,
            ]);
        }
    }

    public static function updateProduct(UpdateRestore $request, Product $product): void
    {
        $data = $request->validated();

        if (!empty($data['preview_image'])) {
            $data['preview_image'] = self::imageToStorage($data['preview_image'], $product->preview_image);
        }

        $tagIds = [];
        $colorIds = [];

        if (!empty($data['tags'])) {
            $tagIds = $data['tags'];
            unset($data['tags']);
        }

        if (!empty($data['colors'])) {
            $colorIds = $data['colors'];
            unset($data['colors']);
        }

        $product->update($data);
        if (empty($data['no_change_tags'])) {
           $product->tags()->sync($tagIds);
        }
        if (empty($data['no_change_colors'])) {
            $product->colors()->sync($colorIds);
        }
    }

    public static function updatePreviewImage(UploadedFile $image, Product $product): void
    {
       $product->update([
           'preview_image' => self::imageToStorage($image, $product->preview_image)
       ]);
    }

    public static function updateProductImages(?array $productImages, Product $product): void
    {
       $product->productImages()->delete();

       if ($productImages) {
           foreach ($productImages as $productImage) {
               $filePath = Storage::disk('public')->put('/image', $productImage);
               $product->productImages()->create([
                   'file_path' => $filePath,
               ]);
           }
       }
    }

    private static function imageToStorage(UploadedFile $image, ?string $fileName): string
    {
        if ($fileName) {
            if (Storage::disk('public')->exists($fileName)) {
                Storage::disk('public')->delete($fileName);
            }
        }

        return Storage::disk('public')->put('/image', $image);
    }

    public function randomProduct(): Collection
    {
        return Product::query()
            ->get()
            ->random(6)
            ->map(function (Product $item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'price' => $item->price,
                    'description' => $item->description,
                    'url' => $item->imageUrl,
                ];
            });
    }

    public function categoryProducts(int $categoryId): ?Collection
    {
        return Product::query()
            ->where('category_id', $categoryId)
            ->get()
            ->map(function (Product $item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'price' => $item->price,
                    'description' => $item->description,
                    'url' => $item->imageUrl,
                ];
            });
    }
}
