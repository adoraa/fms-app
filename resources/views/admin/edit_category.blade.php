@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Edit Category <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('category.update', $category->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name" class="input__label">Name of Category</label>
                        <input type="text" name="name" class="form-control input-style" id="name"
                            placeholder="Enter Category Name" required value="{{ $category->name }}">
                        
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-style mt-4">Update Category</button>
                </form>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection