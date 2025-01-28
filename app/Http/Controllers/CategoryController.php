<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories=Category::all();
        return view('admin.product.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.product.addItemPages.addCategoryForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'categoryName' => 'required|unique:categories,categoryName',
        ]);
        $category = new Category();
        $category->categoryName=$request->categoryName;
        $saved=$category->save();
        if($saved)
        {
            return redirect('/admin/categories');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categoryId)
    {
        //
        // dd($category);
        $category=Category::where('id',$categoryId)->first();
        return view('admin.product.editItemPages.editCategoryForm',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$categoryId)
    {
        //
        $request->validate([
            'categoryName' => 'required|unique:categories,categoryName,' . $categoryId, // Ignore the current category by its ID
        ]);
        
        $category=Category::where('id', $categoryId)
        ->update(['categoryName' => $request->categoryName]);
        if($category)
        {
            return redirect('/admin/categories/');
        }
        }
        public function toggleStatus($categoryId)
        {
            // Find the rating by ID
            $category = Category::findOrFail($categoryId);
        
            // Toggle the status
            $category->status = $category->status === 'active' ? 'inactive' : 'active';
        
            // Save the updated status
            $category->save();
        
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Category status updated successfully!');
        }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryId)
    {
        //
        $category=Category::where('id',$categoryId)->update(['status'=>'inactive']);
        if($category)
        {
            return redirect('/admin/categories/');
        }
    }
}
