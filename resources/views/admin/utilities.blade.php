@extends('layouts.portal')
@section('content')

<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Utilities</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">

    <!-- click button -->
    <a href="{{ route('utility.create') }}" class="btn btn-primary">New</a><br/><br/>

    <!-- data tables -->
    <div class="data-tables">
        <div class="row">
          <div class="col-lg-12 mb-4">
            <div class="card card_border p-4">
              <h3 class="card__title position-absolute">All Utilities</h3>
              @include('includes.errors')
              <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Utility</th>
                      <th>Location</th>
                      <th>Category</th>
                      @can('create', App\Models\Utility::class)
                      <th>Edit</th>
                      <th>Delete</th>
                      @endcan
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($utilities as $utility)
                      <tr>
                          
                          <td>{{ $utility->name }}</td>
                          <td>{{ $utility->facility->name }}</td>
                          <td>{{ $utility->category->name }}</td>
                          @can('update', $utility)
                            <td><a href="{{ route('utility.edit', $utility->id) }}">Edit</a></td>
                            <td><form action="{{ route('utility.destroy', $utility->id) }}" method="POST">@method('delete') @csrf <button type="submit"> <i class="material-icons">delete</i></button></form></td>
                          @endcan
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