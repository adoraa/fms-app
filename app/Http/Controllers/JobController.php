<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\Role;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::orderBy('name')->get();
        return view('admin.jobs', compact('jobs'));
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
        return view('admin.create_job', compact(['roles']));
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
        Job::create(request()->validate([
            'name' => ['required', 'unique:jobs,name'],
            'role_id' => ['required']
        ]));
        session()->flash('success', 'Job created successfully');
        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(job $job)
    {
        //
        $roles = Role::orderBy('title')->get();
        return view('admin.edit_job', compact(['job', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, job $job)
    {
        //
        request()->validate([
            'name' => ['required'],
            'role_id' => ['required']
        ]);

        $job->name = $request->name;
        $job->role_id = $request->role_id;
        $job->save();

        session()->flash('success', 'Job updated successfully');
        return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(job $job)
    {
        //
        $job->delete();
        session()->flash('success', $job->name.' has been deleted successfully');
        return back();
    }
}
