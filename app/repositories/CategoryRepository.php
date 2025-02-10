<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        return Category::with('children', 'parent')->get();
    }

    public function storeCategory(array $data)
    {
        Category::create($data);
    }

    public function findCategoryById($id)
{
    return Category::with('children', 'parent')->findOrFail($id);
}

    public function updateCategory(Category $category, array $data)
    {
        $category->update($data);
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
    }
}

