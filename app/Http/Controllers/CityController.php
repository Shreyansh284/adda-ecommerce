<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cityData = City::where('status', '!=', 'delete')->get();
        
        return view('admin.location.cities', compact('cityData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::whereNot('status', 'delete')
        ->orderBy('state', 'asc')
        ->get();

        return view('admin.location.addLocationPage.addCityForm', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->stateId);
        City::create([
            'city' => $request->cityName,
            'pincode' => $request->pincode,
            'stateId' => $request->stateId,
        ]);

        return redirect('/admin/cities');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cityData = city::where('id', $id)->first();
        $states = State::whereNot('status', 'delete')
        ->orderBy('state', 'asc')
        ->get();
        return view('admin.location.editLocationPage.editCityForm', compact('cityData', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $city = City::findOrFail($request->id);
        $city->city = $request->cityName;
        $city->pincode = $request->pincode;
        $city->stateId = $request->stateId;
        $city->save();

        return redirect('/admin/cities');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $city = city::findOrFail($request->id);
        $city->status = 'delete';
        $city->save();
        return redirect('/admin/cities');
    }

    public function toggleStatus(Request $request)
    {
        try {
            $city = city::findOrFail($request->id);
            if ($city->status == 'active') {
                $city->status = 'inactive';
            } else {
                $city->status = 'active';
            }
            $city->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => true]);
        }
    }
}
