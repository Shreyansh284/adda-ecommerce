<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ratings = Rating::all();
        return view('admin.rating.ratings', compact('ratings'));
    }

    public function toggleStatus($ratingId)
    {
        // Find the rating by ID
        $rating = Rating::findOrFail($ratingId);

        // Toggle the status
        $rating->status = $rating->status === 'active' ? 'inactive' : 'active';

        // Save the updated status
        $rating->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Rating status updated successfully!');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productId' => 'required|exists:products,id',
            'rating' => 'required|numeric|min:1|max:5',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Rating::create([
            'userId' => Auth::id(),
            'productId' => $request->productId,
            'title' => $request->title,
            'description' => $request->description,
            'rating' => $request->rating,
            'status' => 'active',
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
