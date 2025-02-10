<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAllCategories();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAllCategories();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->storeCategory($request->validated());

        return redirect()->route('admin.categories.index')->with('success', 'Category successfully added');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $categories = $this->categoryRepository->getAllCategories();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryRepository->updateCategory($category, $request->validated());

        return redirect()->route('admin.categories.index')->with('success', 'Category successfully updated');
    }

    public function destroy(Category $category)
    {
        if ($category) {
            $this->categoryRepository->deleteCategory($category);
            return redirect()->route('admin.categories.index')->with('success', 'Category successfully deleted');
        }

        return redirect()->route('admin.categories.index')->with('error', 'Category not found');
    }
}
