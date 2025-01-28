<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $subcategories = SubCategory::query()
            ->join('categories', 'sub_categories.categoryId', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.categoryName as categoryName')
            ->get();

        return view('admin.product.subCategory', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.addItemPages.addSubCategoryForm', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                
        $request->validate([
            'subCategoryName' => 'required|unique:sub_categories,subCategoryName,NULL,id,categoryId,' . $request->categoryId,
        ]);
        
        $subcategory = new SubCategory();
        $subcategory->categoryId=$request->categoryId;
        $subcategory->subCategoryName=$request->subCategoryName;
        $saved=$subcategory->save();
        if($saved)
        {
            return redirect('/admin/subCategories');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($subCategoryId)
    {
        // Fetch the subcategory by ID
        $subCategory = SubCategory::findOrFail($subCategoryId);
    
        // Fetch all categories to populate the dropdown
        $categories = Category::all();
    
        // Return the edit view with the data
        return view('admin.product.editItemPages.editSubCategoryForm', compact('subCategory', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subCategoryId)
    {
        $request->validate([
            'categoryId' => 'required|exists:categories,id',
            'subCategoryName' => 'required|unique:sub_categories,subCategoryName,' . $subCategoryId . ',id,categoryId,' . $request->categoryId,
        ]);
        $subcategory=SubCategory::where('id', $subCategoryId)
        ->update(['subCategoryName' => $request->subCategoryName,'categoryId'=>$request->categoryId]);
        if($subcategory)
        {
            return redirect('/admin/subCategories/');
        }
    }
    public function toggleStatus($subCategoryId)
    {
        // Find the rating by ID
        $subCategory = SubCategory::findOrFail($subCategoryId);
    
        // Toggle the status
        $subCategory->status = $subCategory->status === 'active' ? 'inactive' : 'active';
    
        // Save the updated status
        $subCategory->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Sub Category status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $subCategoryId)
    {
        $subcategory=SubCategory::where('id',$subCategoryId)->update(['status'=>'inactive']);
        if($subcategory)
        {
            return redirect('/admin/subCategories/');
        }
    }
}
