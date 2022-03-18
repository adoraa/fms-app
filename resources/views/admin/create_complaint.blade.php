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
                        <label for="utility_id" class="input__label">Utility</label>
                        <select id="utility_id" class="form-control input-style" name="utility_id">
                            <option selected>-- Select Utility -- </option>
                            @foreach ($utilities as $utility)
                                <option value="{{ $utility->id }}">{{ $utility->name }}</option>
                            @endforeach
                                    
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputUnit" class="input__label">Unit</label>
                        <select id="inputUnit" class="form-control input-style" name="unit_id">
                            <option selected>-- Select Unit -- </option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                                    
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description" class="input__label">Description</label>
                        <textarea class="form-control input-style" id="description" rows="2" placeholder="Description" required> </textarea>
                      </div>
                    </form>
                   
                    <button type="submit" class="btn btn-primary btn-style mt-4">Submit</button>
                </form>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection