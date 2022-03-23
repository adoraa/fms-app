<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\Utility;
use App\Models\Unit;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $complaints = Complaint::latest()->get();
        return view('admin.complaints', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $utilities = Utility::orderBy('name')->get();
        $units = Unit::orderBy('name')->get();
        return view('admin.create_complaint', compact(['utilities', 'units']));
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
        $complaint = Complaint::create(request()->validate([
            'utility_id' => ['required'],
            'unit_id' => ['required'],
            'description' => ['required']
        ]));
        
        $complaint->user_id = auth()->user()->id;
        $complaint->save();
        session()->flash('success', 'Unit created successfully');
        return redirect()->route('complaint.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
        $utilities = Utility::orderBy('name')->get();
        $units = Unit::orderBy('name')->get();
        return view('admin.edit_complaint', compact(['complaint','utilities', 'units']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
        request()->validate([
            'utility_id' => ['required'],
            'unit_id' => ['required'],
            'description' => ['required']
        ]);

        $complaint->utility_id = $request->utility_id;
        $complaint->unit_id = $request->unit_id;
        $complaint->description = $request->description;
        $complaint->save();

        session()->flash('success', 'Report updated successfully');
        return redirect()->route('complaint.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
        $complaint->delete();
        session()->flash('sucess', 'Report deleted successfully');
        return back();
    }
}
