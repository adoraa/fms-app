@extends('layouts.portal')
@section('content')

<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Reports</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">

    <!-- data tables -->
    <div class="data-tables">
        <div class="row">
          <div class="col-lg-12 mb-4">
            <div class="card card_border p-4">
              <h3 class="card__title position-absolute">All Reports</h3>
              @include('includes.errors')
              <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Nature of Job</th>
                      <th>Utility</th>
                      <th>Description</th>
                      <th>Assigned User</th>
                      <th>Materials to be used</th>
                      <th>Approve</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($complaints as $complaint)
                      <tr>
                          
                        <td>{{ $complaint->job->name }}</td>  
                        <td>{{ $complaint->utility->name }}</td>
                        <td>{{ $complaint->description }}</td>
                        <td>{{ $complaint->assigned_user->surname }}, {{ $complaint->assigned_user->firstname }}</td>
                        <td>
                            @foreach ($complaint->complaint_materials as $complaint_material)
                                {{ $complaint_material->material->name }} ({{ $complaint_material->quantity }})  <br/>    
                            @endforeach
                            
                        </td>
                        @if ($complaint->material_gotten == null)
                            <td><a href="{{ route('approve_material', $complaint->id) }}"><i class="material-icons">check</i></a></td>
                        @else
                            <td><a href="{{ route('complaint.track', $complaint->id) }}" class="btn btn-sm btn-primary">Track</a></td>
                        @endif
                    
                      </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection