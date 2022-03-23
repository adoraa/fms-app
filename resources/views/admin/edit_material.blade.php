@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Material</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Edit Material <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('material.update', $material->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name" class="input__label">Name of Material</label>
                                <input type="text" name="name" class="form-control input-style" id="name"
                                    placeholder="Enter Material Name" required value="{{ $material->name }}">    
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="quantity" class="input__label">Quantity</label>
                                <input type="number" name="quantity" class="form-control input-style" id="quantity"
                                    placeholder="Quantity" required value="{{ $material->quantity }}"> 
                            </div>
                        </div>
                    </div>    
                    <button type="submit" class="btn btn-primary btn-style mt-4">Update Material</button>
                </form>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection