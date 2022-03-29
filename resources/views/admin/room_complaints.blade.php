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
                      <th>Room</th>
                      <th></th>
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                  @if ($rooms)
                    @foreach ($rooms as $room)
                      @foreach ($room->utilities as $utility)

                        @foreach($utility->complaints as $complaint)
                        <tr>
                            
                          <td>{{ $complaint->job->name }}</td>  
                          <td>{{ $complaint->utility->name }}</td>
                          <td>{{ $complaint->description }}</td>
                          <td>{{ $complaint->user->room->name }}</td>
                          @if ($complaint->head_of_user == null)
                            <td><a href="{{ route('complaint.approve', $complaint->id) }}"><i class="material-icons">check</i></a></td>
                          @else
                            <td><a href="{{ route('complaint.track', $complaint->id) }}" class="btn btn-sm btn-primary">Track</a></td>
                          @endif
                          
                          
                        </tr>
                      @endforeach
                    @endforeach
                  @endforeach
                @endif
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection