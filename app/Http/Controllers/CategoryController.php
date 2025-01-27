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
    public function edit($category)
    {
        //
        // dd($category);
        $getCategoryById=Category::where('id',$category)->first();
        return view('admin.product.editItemPages.editCategoryForm',compact('getCategoryById'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
