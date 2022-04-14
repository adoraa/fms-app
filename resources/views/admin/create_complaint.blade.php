@extends('layouts.portal');
@section('content');
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Make Complain</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>New Complain <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('complaint.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="inputJob" class="input__label">Nature of job</label>
                        <select id="inputJob" class="form-control input-style" name="job_id">
                            <option selected>-- Select Nature of Job -- </option>
                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->name }}</option>
                            @endforeach
                                    
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="utility_id" class="input__label">Utility</label>
                        <select id="utility_id" class="form-control input-style" name="utility_id">
                            <option selected>-- Select Utility -- </option>
                            @foreach ($utilities as $utility)
                                <option value="{{ $utility->id }}">{{ $utility->name }}</option>
                            @endforeach
                                    
                        </select>
                    </div>
 
                    <div class="form-group">
                        <label for="description" class="input__label">Description</label>
                        <textarea class="form-control input-style" name="description" id="description" rows="2" placeholder="Description" required></textarea>
                      </div>
                   
                    <button type="submit" class="btn btn-primary btn-style mt-4">Submit</button>
                </form>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection