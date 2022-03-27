@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Job</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Edit Job <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('job.update', $job->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name" class="input__label">Name of Job</label>
                        <input type="text" name="name" class="form-control input-style" id="name"
                            placeholder="Enter Job Name" required value="{{ $job->name }}">
                        
                    </div>
                   
                    <div class="form-group">
                        <label for="inputCorrespondingUnit" class="input__label">Unit</label>
                        <select id="inputCorrespondingUnit" class="form-control input-style" name="unit_id">
                            <option selected>-- Select Corresponding Unit </option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}" @if($unit->id == $job->unit_id) selected @endif>{{ $unit->name }} </option>
                            @endforeach
                            
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-style mt-4">Update Job</button>
                </form>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection