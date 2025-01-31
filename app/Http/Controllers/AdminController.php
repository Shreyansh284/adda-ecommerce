<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\HomeSlider;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $today = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();
        $thisYear = Carbon::now()->startOfYear();
        $lastMonth = Carbon::now()->subMonth()->startOfMonth();
        $lastYear = Carbon::now()->subYear()->startOfYear();

        // Sales Today vs Yesterday
        $todaySales = Order::whereDate('created_at', $today)->count();
        $yesterdaySales = Order::whereDate('created_at', Carbon::yesterday())->count();
        $salesChange = $yesterdaySales > 0 ? (($todaySales - $yesterdaySales) / $yesterdaySales) * 100 : 100;

        $sales = [
            'count' => $todaySales,
            'percentage' => round(abs($salesChange), 2),
            'status' => $salesChange >= 0 ? 'increase' : 'decrease'
        ];
        // dd($sales);

        // Revenue This Month vs Last Month
        $thisMonthRevenue = Order::whereBetween('created_at', [$thisMonth, Carbon::now()])->sum('price');
        $lastMonthRevenue = Order::whereBetween('created_at', [$lastMonth, $thisMonth])->sum('price');
        $revenueChange = $lastMonthRevenue > 0 ? (($thisMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100 : 100;

        $revenue = [
            'amount' => $thisMonthRevenue,
            'percentage' => round(abs($revenueChange), 2),
            'status' => $revenueChange >= 0 ? 'increase' : 'decrease'
        ];
       

        // Customers This Year vs Last Year
        $thisYearCustomers = User::whereBetween('created_at', [$thisYear, Carbon::now()])->count();
        $lastYearCustomers = User::whereBetween('created_at', [$lastYear, $thisYear])->count();
        $customersChange = $lastYearCustomers > 0 ? (($thisYearCustomers - $lastYearCustomers) / $lastYearCustomers) * 100 : 100;

        $customers = [
            'count' => $thisYearCustomers,
            'percentage' => round(abs($customersChange), 2),
            'status' => $customersChange >= 0 ? 'increase' : 'decrease'
        ];
        return view('admin.dashboard', compact('sales', 'revenue', 'customers'));
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
    return redirect('/admin/aboutUs')->with('success', 'About Us updated successfully!');
}

public function deleteAboutUs($id)
{
    $aboutUs=AboutUs::where('id',$id)->update(['status'=>'inactive']);
    if($aboutUs)
    {
        return redirect('/admin/aboutUs/');
    }
}
public function toggleStatusAboutUs($id)
{
    // Find the rating by ID
    $aboutUs = AboutUs::findOrFail($id);

    // Toggle the status
    $aboutUs->status = $aboutUs->status === 'active' ? 'inactive' : 'active';

    // Save the updated status
    $aboutUs->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'AboutUs status updated successfully!');
}

public function contactUs()
{
    $contacts=ContactUs::all();
    return view('admin.dynamic.contactUs',compact('contacts'));
}

public function createContactUs()
{
    return view('admin.dynamic.addItemsForm.addContact');
}
public function storeContactUs(Request $request)
{
    // Validate the request data
    $request->validate([
        'mobile' => 'required|digits:10|unique:users,mobile',
        'location' => 'required|string|max:255',
        'timeing' =>'required|string|max:255 ']);


    $contactus=new ContactUs();
    $contactus->mobile =$request->mobile;
    $contactus->location= $request->location;
    $contactus->timeing = $request->timeing;
    $contactus->save(); // Save the image path
   

    // Redirect with a success message
    return redirect('/admin/contactUs');
}
public function editContactUs($id)
{
    $contact = ContactUs::findOrFail($id); // Find the record by ID or throw 404
    return view('admin.dynamic.editItemsForm.editContact', compact('contact'));
}

public function updateContactUs(Request $request, $id)
{
    // Validate the request
    $request->validate([
[
        'mobile' => 'required|digits:10|unique:users,mobile',
        'location' => 'required|string|max:255',
        'timeing' =>'required|string|max:255 '] // Image is optional
    ]);

    $contactUs = ContactUs ::findOrFail($id); // Find the record

    // Update data
    $contactUs->mobile = $request->mobile;
    $contactUs->location = $request->location;
    $contactUs->timeing = $request->timeing;
    $contactUs->save(); // Save updated data

    // Redirect with success message
    return redirect('/admin/contactUs')->with('success', 'About Us updated successfully!');
}

public function deleteContactUs ($id)
{
    $contactUs=ContactUs::where('id',$id)->update(['status'=>'inactive']);
    if($contactUs)
    {
        return redirect('/admin/contactUs/');
    }
}
public function toggleStatusContactUs($id)
{
    // Find the rating by ID
    $contactUs = ContactUs::findOrFail($id);

    // Toggle the status
    $contactUs->status = $contactUs->status === 'active' ? 'inactive' : 'active';

    // Save the updated status
    $contactUs->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'ContactUs status updated successfully!');
}

public function homeSlider()
{
    $sliders = HomeSlider::all();
    return view('admin.dynamic.slider', compact('sliders'));
}

public function createHomeSlider()
{
    return view('admin.dynamic.addItemsForm.addSlider');
}

public function storeHomeSlider(Request $request)
{
    // Validate the request
    $request->validate([
        'image' => 'required|image|',
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('slider_images'), $fileName);

        // Save only the relative path
        $imagePath = 'slider_images/' . $fileName;
    }

    // Create new slider record
    $slider = new HomeSlider;
    $slider->image = $imagePath;
    $slider->save();

    return redirect('/admin/slider')->with('success', 'Slider added successfully!');
}

public function editHomeSlider($id)
{
    $slider = HomeSlider::findOrFail($id);
    return view('admin.dynamic.editItemsForm.editSlider', compact('slider'));
}

public function updateHomeSlider(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'image' => 'nullable|image',
    ]);

    $slider = HomeSlider::findOrFail($id);

    // Handle file upload
    if ($request->hasFile('image')) {
        // Delete old image
        if ($slider->image && file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }

        // Store new image
        $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('slider_images'), $fileName);
        $slider->image = 'slider_images/' . $fileName;
    }

    $slider->save();

    return redirect('/admin/slider')->with('success', 'Slider updated successfully!');
}

public function deleteHomeSlider($id)
{
    $slider = HomeSlider::findOrFail($id);

    // Delete image from storage
    if ($slider->image && file_exists(public_path($slider->image))) {
        unlink(public_path($slider->image));
    }

    $slider->delete();

    return redirect('/admin/slider')->with('success', 'Slider deleted successfully!');
}

public function toggleStatusHomeSlider($id)
{
    $slider = HomeSlider::findOrFail($id);
    $slider->status = $slider->status === 'active' ? 'inactive' : 'active';
    $slider->save();

    return redirect()->back()->with('success', 'Slider status updated successfully!');
}
    
}

