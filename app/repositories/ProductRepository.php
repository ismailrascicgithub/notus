<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::with(['images', 'categories'])->get();
    }

    public function findProductById($id)
    {
        return Product::findOrFail($id);
    }
    public function createProduct($data)
    {
        $product = Product::create([
            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price,
        ]);

        if ($data->hasFile('images')) {
            $images = $data->file('images');


            foreach ($images as $index => $image) {
                $path = $image->store('products', 'public');

                $isMain = $index === 0 ? true : false;

                $product->images()->create([
                    'path' => $path,
                    'is_main' => $isMain,
                ]);

            }
        }

        if ($data->category_id) {
            $product->categories()->sync($data->category_id);
        }

        return $product;
    }

    public function updateProduct($data, Product $product)
    {
        $product->update([
            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price,
        ]);

        if ($data->hasFile('images')) {
            $images = $data->file('images');

            $isMainSet = $product->mainImage();

            foreach ($images as $index => $image) {
                $path = $image->store('products', 'public');

                $isMain = (!$isMainSet && $index === 0) ? true : false;

                if ($isMain) {
                    $isMainSet = true;
                }

                $product->images()->create([
                    'path' => $path,
                    'is_main' => $isMain,
                ]);
            }
        }

        if ($data->category_id) {
            $product->categories()->sync($data->category_id);
        }
    }

    public function deleteProduct(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::delete('public/' . $image->path);
        }

        $product->delete();
    }

    public function setMainImage(Product $product, ProductImage $image)
    {
        $product->images()->update(['is_main' => false]);

        $image->update(['is_main' => true]);
    }
}
