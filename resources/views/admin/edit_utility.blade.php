@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Utility</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Edit Utility <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('utility.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="input__label">Name of Utility</label>
                        <input type="text" name="name" class="form-control input-style" id="name"
                            placeholder="Enter Utility Name" required value="{{ $utility->name }}">
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="inputFacility" class="input__label">Location</label>
                                <select id="inputFacility" class="form-control input-style" name="facility_id">
                                    <option selected>Facility </option>
                                    @foreach ($facilities as $facility)
                                        <option value="{{ $facility->id }}" @if($facility->id == $utility->facility_id) selected @endif>{{ $facility->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="inputFacility" class="input__label">Room Location</label>
                                <select id="inputFacility" class="form-control input-style" name="room_id">
                                    <option selected>Room </option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}" @if($room->id == $utility->room_id) selected @endif>{{ $room->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="inputCategory" class="input__label">Category </label>
                                <select id="inputCategory" class="form-control input-style" name="category_id">
                                    <option selected>Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $utility->category_id) selected @endif>{{ $category->name }}</option>    
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-style mt-4">Update Utility</button>
                </form>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection