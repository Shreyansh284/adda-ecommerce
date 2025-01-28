<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        return view('admin.user.users');
    }


    public function aboutUs()
    {
        $abouts=AboutUs::all();
        return view('admin.dynamic.aboutUs',compact('abouts'));
    }
    
    public function createAboutUs()
    {
        return view('admin.dynamic.addItemsForm.addAbout');
    }
    
    public function contactUs()
    {
        return view('admin.dynamic.contactUs');
    }
    public function storeAboutUs(Request $request)
    {
        // Validate the request data
        $request->validate([
            'member_name' => 'required|string|max:255',
            'member_role' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif', // Validate the image
        ]);
    
        // Handle file upload
     
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('about_us_images'), $fileName);
    
            // Save only the relative path (after 'public/')
            $imagePath = 'about_us_images/' . $fileName;
        }
        // Create a new AboutUs record
        $aboutus=new AboutUs;
        $aboutus->member_name =$request->member_name;
        $aboutus->member_role= $request->member_role;
        $aboutus->image = $imagePath;
        $aboutus->save(); // Save the image path
       
    
        // Redirect with a success message
        return redirect('/admin/aboutUs');
    }

    public function editAboutUs($id)
{
    $aboutUs = AboutUs::findOrFail($id); // Find the record by ID or throw 404
    return view('admin.dynamic.editItemsForm.editAbout', compact('aboutUs'));
}

public function updateAboutUs(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'member_name' => 'required|string|max:255',
        'member_role' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
    ]);

    $aboutUs = AboutUs::findOrFail($id); // Find the record

    // Update data
    $aboutUs->member_name = $request->member_name;
    $aboutUs->member_role = $request->member_role;

    // Handle file upload
    if ($request->hasFile('image')) {
        // Delete the old image
        if ($aboutUs->image && file_exists(public_path($aboutUs->image))) {
            unlink(public_path($aboutUs->image));
        }

        // Store new image
        $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('about_us_images'), $fileName);
        $aboutUs->image = 'about_us_images/' . $fileName;
    }

    $aboutUs->save(); // Save updated data

    // Redirect with success message
    return redirect()->route('aboutUs.index')->with('success', 'About Us updated successfully!');
}

    
}

