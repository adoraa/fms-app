<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Role;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materials = Material::orderBy('name')->get();
        return view('admin.materials', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create_material');
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
        Material::create(request()->validate([
            'name' => ['required', 'unique:materials,name'],
            'quantity' => ['required']
        ]));
        session()->flash('success', 'Material added successfully');
        return redirect()->route('material.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
        return view('admin.edit_material', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
        request()->validate([
            'name' => ['required', 'unique:materials,name'],
            'quantity' => ['required']
        ]);

        $material->name = $request->name;
        $material->quantity = $request->quantity;
        $material->save();

        session()->flash('success', 'Material updated successfully');
        return redirect()->route('material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
        $material->delete();
        session()->flash('success', $material->name.' has been deleted');
        return back();
    }
}
