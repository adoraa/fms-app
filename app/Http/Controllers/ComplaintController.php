<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\Utility;
use App\Models\Job;
use App\Models\Material;
use Carbon\Carbon;

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

    public function my_complaint()
    {
        //
        $complaints = auth()->user()->complaints;
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
        $jobs = Job::orderBy('name')->get();
        $utilities = isset(auth()->user()->room) ? auth()->user()->room->utilities : [];
        return view('admin.create_complaint', compact(['jobs', 'utilities']));
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
            'job_id' => ['required'],
            'utility_id' => ['required'],
            'description' => ['required']
        ]));
        
        $complaint->user_id = auth()->user()->id;
        $complaint->save();
        session()->flash('success', 'Complaint created successfully');
        return redirect()->route('my_complaint');
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
        $jobs = Job::orderBy('name')->get();
        $utilities = Utility::orderBy('name')->get();
        return view('admin.edit_complaint', compact(['complaint','jobs', 'utilities']));
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
            'job_id' => ['required'],
            'utility_id' => ['required'],
            'description' => ['required']
        ]);

        $complaint->job_id = $request->job_id;
        $complaint->utility_id = $request->utility_id;
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

    public function room_complaints()
    {
        //
        $rooms = auth()->user()->rooms;
       
        return view('admin.room_complaints', compact('rooms'));
    }

    public function facility_complaints()
    {
        //
        $facilities = auth()->user()->facilities;
        return view('admin.facility_complaints', compact('facilities'));
    }

    public function unit_complaints()
    {
        //
        $jobs = auth()->user()->role->jobs;
        
        return view('admin.unit_complaints', compact('jobs'));
    }

    public function job_assigned()
    {
        //
        $complaints = Complaint::where('user_assigned', auth()->user()->id)
                        ->where('material_gotten', '<>', null)->get();
        
        return view('admin.job_assigned', compact('complaints'));
    }

    public function assigned_complaints()
    {
        //
        $complaints = Complaint::where('head_of_unit_approval', '<>', null)->get();
        
        return view('admin.assigned_complaints', compact('complaints'));
    }

    public function material_approval()
    {
        //
        $complaints = Complaint::where('estate_manager_approval', '<>', null)->get();
        
        return view('admin.material_approval', compact('complaints'));
    }

    public function complaint_approval()
    {
        //
        $complaints = Complaint::latest()->get();
        return view('admin.complaints_approval', compact('complaints'));
    }

    public function approve_complaints(int $complaint_id)
    {
        //
        $complaint = Complaint::where('id', $complaint_id)->first();
        $complaint->head_of_user = auth()->user()->id;
        $complaint->time_head_of_user_approved = Carbon::now();
        $complaint->save();
        return back();
    }

    public function time_reached(int $complaint_id)
    {
        $complaint = Complaint::where('id', $complaint_id)->first();
        $complaint->time_reached = Carbon::now();
        $complaint->save();
        return back();
    }

    public function job_completed(int $complaint_id)
    {
        $complaint = Complaint::where('id', $complaint_id)->first();
        $complaint->time_job_completed = Carbon::now();
        $complaint->save();
        return back();
    }

    public function review(int $complaint_id)
    {
        $complaint = Complaint::where('id', $complaint_id)->first();
     
        return view('admin.review', compact('complaint'));
    }

    public function track_complaints(int $complaint_id)
    {
        //
        $complaint = Complaint::where('id', $complaint_id)->first();
        return view('admin.track_complaints', compact('complaint'));
    }

    public function view_review(int $complaint_id)
    {
        //
        $complaint = Complaint::where('id', $complaint_id)->first();
        return view('admin.view_review', compact('complaint'));
    }

    public function head_of_unit(int $complaint_id)
    {
        $complaints = Complaint::where('id', $complaint_id)->first();
        return back();
    }

    public function assign_technician(int $complaint_id)
    {
        $complaint = Complaint::where('id', $complaint_id)->first();
        $technicians = auth()->user()->role->users;
        $materials = Material::orderBy('name')->get();
        $complaint_materials = $complaint->complaint_materials;
        
        return view('admin.assign_technician', compact(['complaint', 'technicians', 'materials', 'complaint_materials']));
    }

    public function assign_to_unit(int $complaint_id)
    {
        $complaint = Complaint::where('id', $complaint_id)->first();
        $jobs = Job::where('name', '<>', 'Unknown')->get();
     
        return view('admin.assign_to_unit', compact(['complaint', 'jobs']));
    }

    public function post_technician(Request $request, int $complaint_id)
    {
        $complaint = Complaint::where('id', $complaint_id)->first();
        $complaint->user_assigned = $request->user_assigned;
        $complaint->time_user_assigned = Carbon::now();
        $complaint->head_of_unit_approval = auth()->user()->id;
        $complaint->time_head_of_unit_approved = Carbon::now();
        $complaint->save();
     
        return redirect()->route('unit_complaints');
    }

    public function post_to_unit(Request $request, int $complaint_id)
    {
        $complaint = Complaint::where('id', $complaint_id)->first();
        $complaint->job_id = $request->job_id;
        $complaint->save();
     
        return redirect()->route('unit_complaints');
    }

    public function post_material(Request $request, int $complaint_id)
    {
        $complaint = Complaint::where('id', $complaint_id)->first();
        $complaint->materials()->attach($request->material_id, ['quantity'=> $request->quantity]);
     
        return back();
    }

    public function post_review(Request $request, int $complaint_id)
    {
        $complaint = Complaint::where('id', $complaint_id)->first();
        $complaint->review = $request->review;
        $complaint->rating = $request->rating;
        $complaint->save();
     
        return redirect()->route('my_complaint');
    }

    public function final_approval(int $complaint_id)
    {
        //
        $complaint = Complaint::where('id', $complaint_id)->first();
        $complaint->estate_manager_approval = auth()->user()->id;
        $complaint->time_estate_manager_approved = Carbon::now();
        $complaint->save();
        return back();
    }

    public function approve_material(int $complaint_id)
    {
        //
        $complaint = Complaint::where('id', $complaint_id)->first();
        $complaint->material_gotten = auth()->user()->id;
        $complaint->time_material_gotten = Carbon::now();
        $complaint->save();
        foreach($complaint->materials as $material){
            $quantity_ordered_for = $complaint->complaint_materials()->where('material_id', $material->id)->first()->quantity;
            $quantity_available = $material->quantity;
            $qty_remaining = $quantity_available - $quantity_ordered_for;
            $material->quantity = $qty_remaining;
            $material->save();
        }
        
        return back();
    }


}
