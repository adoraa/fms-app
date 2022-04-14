@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assign Unit</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Assign Unit <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('complaint.post_to_unit', $complaint->id) }}" method="post">
                    @csrf    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="Facility" class="input__label"><b>Facility</b></label><br/>
                                    <label>{{ isset($complaint->utility->room) ? 
                                         $complaint->utility->room->facility->name : 
                                         $complaint->utility->facility->name}}</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="Room" class="input__label"><b>Room Location</b></label><br/>
                                    <label>{{ isset($complaint->utility) ? 
                                        $complaint->utility->room->name :
                                        $complaint->utility->name}}</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="Utility" class="input__label"><b>Utility</b></label><br/>
                                    <label>{{ $complaint->utility->name }}</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="complaint" class="input__label"><b>Complaint</b></label><br/>
                                <label>{{ $complaint->description }}</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="selectUnit" class="input__label"><b>Unit</b> </label><br/>
                                <select id="selectUnit" name="job_id" class="input__label">
                                    <option>-- Select Job --</option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}"> {{ $job->name }} </option>    
                                    @endforeach
                                        
                                </select>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-style mt-6">Submit</button>
                </form>
            </div>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection