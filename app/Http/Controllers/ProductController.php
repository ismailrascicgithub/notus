<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAllCategories();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productRepository->createProduct($request);
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->getAllCategories();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->productRepository->updateProduct($request, $product);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $this->productRepository->deleteProduct($product);
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    public function deleteImage(Product $product, ProductImage $image)
    {
        Storage::delete('public/' . $image->path);
        $image->delete();
        return back()->with('success', 'Image deleted successfully');
    }

    public function setMainImage(Product $product, ProductImage $image)
    {
        $this->productRepository->setMainImage($product, $image);
        return back()->with('success', 'Main image set successfully');
    }
}
