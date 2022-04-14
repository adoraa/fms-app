@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Leave Review</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Leave Review <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('complaint.post_review', $complaint->id) }}" method="post">
                    @csrf    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="Utility" class="input__label"><b>User</b></label><br/>
                                    <label>{{ $complaint->user->firstname }} {{ $complaint->user->surname }}</label>
                            </div>
                        </div>

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
                                <label for="Utility" class="input__label"><b>Job</b></label><br/>
                                    <label>{{ $complaint->job->name }}</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="complaint" class="input__label"><b>Complaint</b></label><br/>
                                <label>{{ $complaint->description }}</label>
                            </div>
                        </div>
                    </div>    

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="review" class="input__label">Review</label>
                                <textarea name="review" class="form-control input-style" id="review" rows="1"
                                    placeholder="Review" required></textarea>  
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="form-group">
                                <label for="number" class="input__label">Rating</label>
                                <select id="rating" class="form-control input-style" name="rating">
                                    <option value="0">-- Rating -- </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
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