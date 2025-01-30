<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Models\Color;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('images', 'sizes')->where('status', 'active')->get();
        // dd($products);
        return view('admin.product.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $colors = Color::where('status', 'active')->get();
        $colors = Color::all();
        $categories = Category::where('status', 'active')->get();
        $subCategories = SubCategory::where('status', 'active')->get();
        // dd($categories, $subCategories);
        return view('admin.product.addItemPages.addProductForm', compact('colors', 'categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // ! DOUBT : color for one product is same ?? or it is diff by category
    //     // * fields
    //     // productName
    //     // description
    //     // price
    //     // discount
    //     // material
    //     // additionalInfo
    //     // categoryId
    //     // subCategoryId
    //     // status
    //     $request->validate([
    //         'productName' => "required",
    //         'description' => "required",
    //         'price' => "required",
    //         'categoryId' => "required",
    //         'subCategoryId' => "required",
    //         "size" => 'required',
    //         "quantity" => "required",
    //         'color' => "required",
    //         "image" => 'required',
    //     ]);

    //     // * loop
    //     $product = new Product();
    //     $product->productName = $request->productName;
    //     $product->description = $request->description;
    //     $product->price = $request->price;
    //     $product->discount = $request->productDiscount;
    //     $product->material = $request->productMaterial;
    //     $product->additionalInfo = $request->additionalInfo;
    //     $product->categoryId = $request->categoryId;
    //     $product->subCategoryId = $request->subCategoryId;

    //     $saved = $product->save();

    //     if ($saved) {
    //         $sizes = $request->size;
    //         $colors = $request->color;
    //         $quantities = $request->quantity;
    //         $images = $request->image;

    //         if (is_array($sizes) &&  is_array($quantities)) {
    //             $count = count($sizes);

    //             for ($i = 0; $i < $count; $i++) {
    //                 $size = new Size();
    //                 $size->productId = $product->id;
    //                 $size->colorId = $colors[$i] ?? null;
    //                 $size->size = $sizes[$i] ?? null;
    //                 $size->quantity = $quantities[$i] ?? 0;

    //                 $image = new Image();
    //                 $image->productId = $product->id;
    //                 $image->image = $images[$i] ?? null;

    //                 $size->save();
    //                 $image->save();
    //             }
    //         }
    //         // return redirect('/admin/products')->with('success', 'Product and sizes saved successfully!');
    //         return redirect('/admin/products');
    //     }
    // }
    public function store(Request $request)
    {
        $request->validate([
            'productName' => "required",
            'description' => "required",
            'price' => "required",
            'categoryId' => "required",
            'subCategoryId' => "required",
            "size" => 'required|array',
            "quantity" => "required|array",
            'color' => "required|array",
            "image" => 'required|array',
        ]);

        $product = new Product();
        $product->productName = $request->productName;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->productDiscount;
        $product->material = $request->productMaterial;
        $product->additionalInfo = $request->additionalInfo;
        $product->categoryId = $request->categoryId;
        $product->subCategoryId = $request->subCategoryId;

        $saved = $product->save();

        if ($saved) {
            $sizes = $request->size;
            $colors = $request->color;
            $quantities = $request->quantity;
            $images = $request->file('image');

            $count = count($sizes);

            if ($count > 0 && count($colors) === $count && count($quantities) === $count) {
                for ($i = 0; $i < $count; $i++) {
                    $size = new Size();
                    $size->productId = $product->id;
                    $size->colorId = $colors[$i] ?? null;
                    $size->size = $sizes[$i] ?? null;
                    $size->quantity = $quantities[$i] ?? 0;
                    $size->save();

                    if (isset($images[$i]) && $images[$i]->isValid()) {
                        $imageName = time() . '_' . $images[$i]->getClientOriginalName();
                        // $imagePath = $images[$i]->move('../admin/assets/img/', $imageName);
                        // $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
                        $images[$i]->move(public_path('product_images'), $imageName);

                        // Save only the relative path (after 'public/')
                        $imagePath = 'product_images/' . $imageName;

                        $image = new Image();
                        $image->productId = $product->id;
                        $image->image = $imagePath;
                        $image->save();
                    }
                }
            } else {
                // return redirect('/admin/products')->with('error', 'Mismatch in size, color, quantity, or image data.');
                dd('Mismatch in size, color, quantity, or image data.');
            }

            // return redirect('/admin/products')->with('success', 'Product, sizes, and images saved successfully!');
            return redirect('/admin/products');
        } else {
            // return redirect('/admin/products')->with('error', 'Failed to save the product.');
            dd('Failed to save the product.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
