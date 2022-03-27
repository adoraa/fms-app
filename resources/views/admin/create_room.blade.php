@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Room</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Add Room <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('room.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="input__label">Name of Room</label>
                        <input type="text" name="name" class="form-control input-style" id="name"
                            placeholder="Enter Room Name" required>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="inputFacility" class="input__label">State</label>
                                <select id="inputFacility" class="form-control input-style" name="facility_id">
                                    <option selected>-- Facility -- </option>
                                    @foreach ($facilities as $facility)
                                        <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="headofRoom" class="input__label">Head of Room: </label>
                                <select id="headofRoom" class="form-control input-style" name="user_id">
                                    <option selected>-- Choose Room Head --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->surname }}, {{ $user->firstname }}</option>    
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
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