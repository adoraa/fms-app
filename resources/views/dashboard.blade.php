@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
    <div class="welcome-msg pt-3 pb-4">
      <h1>Hi <span class="text-primary">{{ Auth::user()->firstname }}</span>, Welcome back</h1>
      <p>{{ Auth::user()->role->title }}</p> <!--User's role-->
    </div>

    <!-- statistics data : Facility And Estate Manager-->
    @can('dashboard')
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-apartment"> </i>
                <h3 class="text-primary number">{{ $num_facilities }}</h3>
                <p class="stat-text"><a href="{{ route('facility.index') }}">Facilities</a> </p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-users"> </i>
                <h3 class="text-secondary number">{{ $num_roles }}</h3>
                <p class="stat-text"><a href="{{ route('role.index') }}">Roles</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-list"> </i>
                <h3 class="text-success number">{{ $num_categories }}</h3>
                <p class="stat-text"><a href="{{ route('category.index') }}">Categories</a></p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-file-empty"> </i>
                <h3 class="text-danger number">{{ $num_complaints }}</h3>
                <p class="stat-text"><a href="{{ route('complaint.index') }}">Complaints</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //statistics data -->
    @endcan

    <!-- statistics data : Unit head-->
    @can('unit_complaints')
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-file-empty"> </i>
                <h3 class="text-primary number">{{ $num_unit_complaints }}</h3>
                <p class="stat-text"><a href="{{ route('unit_complaints') }}">Unit Complaints</a> </p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-users"> </i>
                <h3 class="text-secondary number">{{ $num_staff }}</h3>
                <p class="stat-text"><a href="">Staff</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-checkmark-cirlce"> </i>
                <h3 class="text-success number">{{ $num_jobs_completed }}</h3>
                <p class="stat-text"><a href="">Jobs Completed</a></p>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    <!-- //statistics data -->
    @endcan
   
    <!-- statistics data : Unit Technician-->
    @can('assigned_complaints')
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-empty-file"> </i>
                <h3 class="text-primary number">{{ $num_complaints_assigned }}</h3>
                <p class="stat-text"><a href="{{ route('assigned_complaints') }}">Job Assigned</a> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //statistics data -->
    @endcan
    
    <!-- statistics data : Head of room-->
    @can('approve_room_complaints')
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-empty-file"> </i>
                <h3 class="text-primary number">{{ $num_room_jobs }}</h3>
                <p class="stat-text"><a href="{{ route('room_complaint') }}">Room Complaints</a> </p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-users"> </i>
                <h3 class="text-secondary number">{{ $num_rooms_users }}</h3>
                <p class="stat-text"><a href="">Room Users</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-map-marker"> </i>
                <h3 class="text-success number">{{ $num_rooms }}</h3>
                <p class="stat-text"><a href="">Rooms</a></p>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    <!-- //statistics data -->
    @endcan

    <!-- statistics data : Head of facility-->
    @can('approve_facility_complaints')
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-file-empty"> </i>
                <h3 class="text-primary number">{{ $num_facility_jobs }}</h3>
                <p class="stat-text"><a href="{{ route('facility_complaint') }}">Facility Complaints</a> </p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-users"> </i>
                <h3 class="text-secondary number">{{ $num_facilities_users }}</h3>
                <p class="stat-text"><a href="">Facility Users</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-apartment"> </i>
                <h3 class="text-success number">{{ $num_facilities }}</h3>
                <p class="stat-text"><a href="">Facilities</a></p>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    <!-- //statistics data -->
    @endcan

    <!-- statistics data : Staff and Student-->
    @can('staff_student')
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-file-empty"> </i>
                <h3 class="text-primary number">{{ $num_my_complaints }}</h3>
                <p class="stat-text"><a href="{{ route('my_complaint') }}">My Complaints</a> </p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-cog"> </i>
                <h3 class="text-secondary number">{{ $num_utilities }}</h3>
                <p class="stat-text"><a href="">Utilities</a></p>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    <!-- //statistics data -->
    @endcan

  </div>
  @endsection