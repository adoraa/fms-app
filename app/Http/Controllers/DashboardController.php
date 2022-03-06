<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $num_facilities = Facility::count();
        return view('dashboard', compact(['num_facilities']));
    }
}
