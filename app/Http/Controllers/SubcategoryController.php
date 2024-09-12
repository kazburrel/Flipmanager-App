<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{
    public function storeSubcategory(StoreSubCategoryRequest $request)
    {
        Subcategory::create($request->safe()->merge([])->all());
        toast()->success('Subcategory created successfully.');
        return redirect()->route('admin.categories');
    }

    public function destroySubcategory($subcategory)
    {
        // dd($subcategory);
        $subcategory = Subcategory::find($subcategory);

        if ($subcategory) {
            $subcategory->delete();
            toast()->success('Subcategory deleted successfully.');
        } else {
            toast()->error('Subcategory not found.');
        }

        return redirect()->route('admin.categories');
    }

    public function updateSubcategory(Request $request, $subcategory)
    {
        $subcategory = Subcategory::findOrFail($subcategory);
        $subcategory->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));
        toast()->success('Subcategory updated successfully.');
        return redirect()->route('admin.categories');
    }
}
