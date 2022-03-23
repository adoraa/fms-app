@extends('layouts.portal')
@section('content')

<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Job</li>
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
              <h3 class="card__title position-absolute">All Jobs</h3>
              @include('includes.errors')
              <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Nature of Job</th>
                      <th>Unit</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($jobs as $job)
                      <tr>
                          
                          <td>{{ $job->name }}</td>
                          <td>{{ $job->unit->name }}</td>
                          <td><a href="{{ route('job.edit', $job->id) }}">Edit</a></td>
                          <td><form action="{{ route('job.destroy', $job->id) }}" method="POST">@method('delete') @csrf <button type="submit"> <i class="material-icons">delete</i></button></form></td>
                    
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