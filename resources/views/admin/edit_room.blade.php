@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Room</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Edit Room <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('room.update', $room->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name" class="input__label">Name of Room</label>
                        <input type="text" name="name" class="form-control input-style" id="name"
                            placeholder="Enter Room Name" required value="{{ $room->name }}">
                        
                    </div>
                   
                    <div class="form-group">
                        <label for="inputLocationofRoom" class="input__label">Head of Facility</label>
                        <select id="inputLocationofRoom" class="form-control input-style" name="user_id">
                            <option selected>-- Select Location of Room </option>
                            @foreach ($facilities as $facility)
                                <option value="{{ $facility->id }}" @if($facility->id == $room->facility_id) selected @endif>{{ $facility->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputHeadofRoom" class="input__label">Head of Room</label>
                        <select id="inputHeadofRoom" class="form-control input-style" name="user_id">
                            <option selected>-- Select Head of Room -- </option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if($user->id == $room->user_id) selected @endif>{{ $user->surname }}, {{ $user->firstname }}</option>
                            @endforeach
                            
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary btn-style mt-4">Update Room</button>
                </form>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection