<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $units = Unit::orderBy('name')->get();
        return view('admin.units', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::orderBy('title')->get();
        $users = User::orderBy('surname')->orderBy('firstname')->get();
        return view('admin.create_unit', compact(['roles', 'users']));
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
        Unit::create(request()->validate([
            'name' => ['required', 'unique:units,name'],
            'role_id' => ['required'],
            'user_id' => ['required']
        ]));
        session()->flash('success', 'Unit created successfully');
        return redirect()->route('unit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
        $roles = Role::orderBy('title')->get();
        return view('admin.edit_unit', compact(['unit', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
        request()->validate([
            'name' => ['required'],
            'role_id' => ['required']
        ]);

        $unit->name = $request->name;
        $unit->role_id = $request->role_id;
        $unit->save();

        session()->flash('success', 'Unit updated successfully');
        return redirect()->route('unit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
        $unit->delete();
        session()->flash('success', $unit->name.' has been deleted successfully');
        return back();
    }
}
