<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.product.color', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.addItemPages.addColorForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Color::create([
            'color' => $request->colorName,
            'hexcode' => $request->colorCode,
        ]);
    
        return redirect('/admin/colors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $color = color::findOrFail($id);
        return view('admin.product.editItemPages.editColorForm', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $color = Color::where('id', $request->id)->first();
        $color->color = $request->colorName;
        $color->hexcode = $request->colorCode;
        $color->save();
    
        return redirect('/admin/colors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $color = color::where('id', $id)->delete();
        return redirect('/admin/colors');
    }
}
