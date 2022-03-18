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

    <!-- statistics data -->
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
                <i class="lnr lnr-layers"> </i>
                <h3 class="text-success number">{{ $num_categories }}</h3>
                <p class="stat-text"><a href="{{ route('category.index') }}">Categories</a></p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-inbox"> </i>
                <h3 class="text-danger number">{{ $num_complaints }}</h3>
                <p class="stat-text"><a href="{{ route('complaint.index') }}">Complaints</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //statistics data -->

  </div>
  @endsection