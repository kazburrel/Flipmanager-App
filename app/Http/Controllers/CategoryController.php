<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function listCategories()
    {
        $categories = Category::with('subcategories')->get();
        $user = authenticated();
        return view('backend.category.category', [
            'categories' => $categories,
            'user' => $user,
            'title' => 'Category Manager'
        ]);
    }

    public function storeCategory(StoreCategoryRequest $request)
    {
        $user = authenticated();
        Category::create($request->safe()->merge([
            'created_by' => $user->id,
        ])->all());

        toast()->success('Category created successfully.');
        return redirect()->route('admin.categories');
    }

    public function editCategory(UpdateCategoryRequest $request, $edit)
    {
        $category = Category::findOrFail($edit);
        $category->update($request->validated());
        toast()->success('Category updated successfully.');
        return redirect()->route('admin.categories');
    }

    public function destroyCategory($category)
    {
        // dd($category);
        $category = Category::findOrFail($category);
        $category->delete();
        toast()->success('Category deleted successfully.');
        return redirect()->route('admin.categories');
    }
}
