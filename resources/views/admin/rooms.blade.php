@extends('layouts.portal')
@section('content')

<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Rooms</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">

    <!-- click button -->
    <a href="{{ route('room.create') }}" class="btn btn-primary">New</a><br/><br/>

    <!-- data tables -->
    <div class="data-tables">
        <div class="row">
          <div class="col-lg-12 mb-4">
            <div class="card card_border p-4">
              <h3 class="card__title position-absolute">All Rooms</h3>
              @include('includes.errors')
              <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Room</th>
                      <th>Location</th>
                      <th>Head of Room</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($rooms as $room)
                      <tr>
                          
                          <td>{{ $room->name }}</td>
                          <td>{{ $room->facility->name }}</td>
                          @if (isset($room->head_of_room))
                            <td>{{ $room->head_of_room->surname }}, {{ $room->head_of_room->firstname }}</td>
                          @else
                            <td></td>
                          @endif
                          <td><a href="{{ route('room.edit', $room->id) }}">Edit</a></td>
                          <td><form action="{{ route('room.destroy', $room->id) }}" method="POST">@method('delete') @csrf <button type="submit"> <i class="material-icons">delete</i></button></form></td>
                    
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