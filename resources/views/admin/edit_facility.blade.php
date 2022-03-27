@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Facility</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Edit Facility <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('facility.update', $facility->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name" class="input__label">Name of Facility</label>
                        <input type="text" name="name" class="form-control input-style" id="name"
                            placeholder="Enter Facility Name" required value="{{ $facility->name }}">
                        
                    </div>
                   
                    <div class="form-group">
                        <label for="inputHeadofFacility" class="input__label">Head of Facility</label>
                        <select id="inputHeadofFacility" class="form-control input-style" name="user_id">
                            <option selected>-- Select Head of Facility </option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if($user->id == $facility->user_id) selected @endif>{{ $user->surname }}, {{ $user->firstname }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-style mt-4">Update Facility</button>
                </form>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection