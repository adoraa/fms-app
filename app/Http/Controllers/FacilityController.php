<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facilities = Facility::orderBy('name')->get();
        return view('admin.facilities', compact('facilities'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::orderBy('surname')->orderBy('firstname')->get();
        return view('admin.create_facility', compact(['users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Facility::create(request()->validate([
            'name' => ['required', 'unique:facilities,name'],
            'user_id' => ['required']
        ]));
        session()->flash('success', 'Facility created successfully');
        return redirect()->route('facility.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        //
        $users = User::orderBy('surname')->orderBy('firstname')->get();
        return view('admin.edit_facility', compact(['facility', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        //
        request()->validate([
            'name' => ['required'],
            'user_id' => ['required']
        ]);

        $facility->name = $request->name;
        $facility->user_id = $request->user_id;
        $facility->save();

        session()->flash('success', 'Facility updated successfully');
        return redirect()->route('facility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        //
        $facility->delete();
        session()->flash('success', $facility->name.' has been deleted successfully');
        return back();

    }
}
