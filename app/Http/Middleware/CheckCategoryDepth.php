<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Category;

class CheckCategoryDepth
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('parent_id') && $request->parent_id) {
            $parentCategory = Category::find($request->parent_id);

            if ($parentCategory && $this->getCategoryLevel($parentCategory) >= 3) {
                return redirect()->back()->withErrors([
                    'parent_id' => 'Categories cannot go deeper than 3 levels.'
                ])->withInput();
            }
        }

        return $next($request);
    }

    private function getCategoryLevel($category)
    {
        $level = 0;

        while ($category) {
            $category = $category->parent;
            $level++;
        }

        return $level;
    }
}
