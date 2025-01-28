<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ratings=Rating::all();
    return view ('admin.rating.ratings',compact('ratings'));
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
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
