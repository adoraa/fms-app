<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Complaint;
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
        return view('dashboard', compact(['num_facilities', 'num_roles', 'num_categories',
        'num_complaints']));
    }
}
