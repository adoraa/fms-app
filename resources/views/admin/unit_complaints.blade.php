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
                      <th>Assigned to</th>
                      <th></th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($jobs as $job)
                      @foreach ($job->complaints()->where('head_of_user', '<>', null)->get() as $complaint)
                        <tr>
                            
                          <td>{{ $complaint->job->name }}</td>  
                          <td>{{ $complaint->utility->name }}</td>
                          <td>{{ $complaint->description }}</td>
                          @if (isset($complaint->assigned_user))
                            <td>{{ $complaint->assigned_user->surname }} {{ $complaint->assigned_user->firstname }}</td>
                          @else
                          <td></td>
                          @endif
                          @can('assign_to_unit')
                            <td><a href="{{ route('complaint.assign_to_unit', $complaint->id) }}">Assign to Unit</a></td>
                          @endcan
                          @can('assign_techincician')
                          @if ($complaint->user_assigned == null)
                            <td><a href="{{ route('complaint.assign_technician', $complaint->id) }}">Assign Technician</a></td>
                          @else
                          <td><a href="{{ route('complaint.track', $complaint->id) }}" class="btn btn-sm btn-primary">Track</a></td>
                          @endif
                          @endcan
                        </tr>
                      @endforeach
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