<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class ApiProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return response()->json($this->productRepository->getAllProducts());
    }

    public function show($id)
    {
        return response()->json($this->productRepository->findProductById($id));
    }
}
