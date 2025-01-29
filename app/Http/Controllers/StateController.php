<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stateData = State::where('status', '!=', 'delete')->get();
        return view('admin.location.states', compact('stateData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.location.addLocationPage.addStateForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        State::create([
            'state' => $request->stateName,
            'codeState' => strtoupper($request->stateCode), // Store state code in uppercase
        ]);

        return redirect('/admin/states');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $stateData = state::where('id', $id)->first();
        return view('admin.location.editLocationPage.editStateForm', compact('stateData'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $state = State::findOrFail($request->id);
        $state->state = $request->stateName;
        $state->codeState = $request->stateCode;
        $state->save();
        return redirect('/admin/states');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $state = State::findOrFail($request->id);
        $state->status = 'delete';
        $state->save();
        return redirect('/admin/states');
    }


    public function toggleStatus(Request $request)
    {
        try {
            $state = State::findOrFail($request->id);
            if ($state->status == 'active') {
                $state->status = 'inactive';
            } else {
                $state->status = 'active';
            }
            $state->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => true]);
        }
    }
}
