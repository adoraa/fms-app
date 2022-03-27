@extends('layouts.portal')
@section('content')

<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Facility</li>
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
              <h3 class="card__title position-absolute">All Facilities</h3>
              @include('includes.errors')
              <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Facility Name</th>
                      <th>Head of Facility</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($facilities as $facility)
                        <tr>
                            
                            <td>{{ $facility->name }}</td>
                            @if(isset($facility->head_of_facility))
                              <td> {{ $facility->head_of_facility->surname }}, {{ $facility->head_of_facility->firstname }}</td>
                            @else
                              <td></td>
                            @endif
                            <td><a href="{{ route('facility.edit', $facility->id) }}">Edit</a></td>
                            <td><form action="{{ route('facility.destroy', $facility->id) }}" method="post">@method('delete') @csrf <button type="submit" > <i class="material-icons">delete</i></button> </form></td>
                            
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