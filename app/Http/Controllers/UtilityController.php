<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use App\Models\Facility;
use App\Models\Category;
use App\Models\Room;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $utilities = Utility::orderBy('name')->get();
        return view('admin.utilities', compact('utilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $facilities = Facility::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $rooms = Room::orderBy('name')->get();
        
        return view('admin.create_utility', compact(['facilities', 'categories', 'rooms']));
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
        $utility = Utility::create(request()->validate([
            'name' => ['required'],
            'facility_id' => ['required'],
            'category_id' => ['required'],
        ]));
        if ($request->room_id != null){
            $utility->room_id = $request->room_id;
            $utility->save();
        }
        session()->flash('sucess', 'Utility added successfully');
        return redirect()->route('utility.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function show(Utility $utility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function edit(Utility $utility)
    {
        //
        $facilities = Facility::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $rooms = Room::orderBy('name')->get();
        return view('admin.edit_utility', compact(['utility', 'facilities', 'categories', 'rooms']))
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utility $utility)
    {
        //
        request()->validate([
            'name' => ['required'],
            'facility_id' => ['required'],
            'category_id' => ['required'],
            'room_id' => ['required']
        ]);

        $utility->name = $request->name;
        $utility->facility_id = $request->facility_id;
        $utility->category_id = $request->category_id;
        $utility->room_id = $request->room_id;
        $utility->save();

        session()->flash('success', 'Utility updated successfully');
        return redirect()->route('utility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utility $utility)
    {
        //
        $utility->delete();
        session()->flash('success', $utility->name.' has been deleted successfully');
        return back();
    }
}
