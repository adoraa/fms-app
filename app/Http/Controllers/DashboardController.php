<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Complaint;
use App\Models\Job;
use App\Models\Room;
use App\Models\Material;
use App\Models\MaterialComplaint;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Role;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
      
        $num_facilities = Facility::count();
        $num_roles = Role::count();
        $num_categories = Category::count();
        $num_complaints = Complaint::count();
        
        //head of technician
        $num_unit_complaints = 0;
        foreach(auth()->user()->role->jobs as $job)
            $num_unit_complaints += $job->complaints()->count();
        
        $num_staff = auth()->user()->role->users()->count();
        $num_jobs_completed =  Complaint::where('user_assigned', auth()->user()->id)->where('time_job_completed', '<>', null)->count();

        //unit technicians
        $num_complaints_assigned = Complaint::where('user_assigned', auth()->user()->id)->count();

        //head of room
        $num_room_jobs = 0;
        if (auth()->user()->rooms){
            foreach(auth()->user()->rooms as $room){
                if ($room->utilities){
                    foreach ($room->utilities as $utility) 
                        $num_room_jobs += $utility->complaints()->count();
                     
                }
            }
        }

        $num_rooms_users = 0;
        if(auth()->user()->rooms){ 
            foreach(auth()->user()->rooms as $room)
                
               $num_rooms_users += $room->users()->count();
        }     
        

        $num_rooms = auth()->user()->rooms()->count();
        
        //head of facility
        $num_facility_jobs = 0;
        if (auth()->user()->facilities){
            foreach(auth()->user()->facilities as $facility){
                if ($facility->utilities){
                    foreach ($facility->utilities as $utility) 
                        $num_facility_jobs += $utility->complaints()->count();
                } 
            }
        }
        $num_facilities_users = 0;
        if(auth()->user()->facilities){
            foreach(auth()->user()->facilities as $facility)    
                $num_facilities_users += $room->users()->count();
        }

        $num_facilities = auth()->user()->facilities()->count();
        
        //staff_and_student
        $num_my_complaints = auth()->user()->complaints()->count();
        
        $num_utilities = isset(auth()->user()->room->utilities) ? auth()->user()->room->utilities()->count() : 0;

        return view('dashboard', compact(['num_facilities', 'num_roles', 'num_categories',
        'num_complaints', 'num_unit_complaints', 'num_complaints_assigned', 'num_staff',
        'num_facilities', 'num_jobs_completed', 'num_room_jobs', 'num_rooms_users',
        'num_rooms','num_facility_jobs', 'num_facilities_users', 'num_facilities',
        'num_my_complaints', 'num_utilities']));
    }
}
