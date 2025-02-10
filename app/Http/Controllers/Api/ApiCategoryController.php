<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class ApiCategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return response()->json($this->categoryRepository->getAllCategories());
    }

    public function show($id)
    {
        return response()->json($this->categoryRepository->findCategoryById($id));
    }
}
