@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Role</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Create Role <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('role.update', $role->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="title" class="input__label">Name of Role</label>
                        <input type="text" name="title" class="form-control input-style" id="name"
                            placeholder="Enter Role Title" required value="{{ $role->title }}">
                        
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-style mt-4">Update Role</button>
                </form>
            </div>
        </div>
        <!-- //forms 1 -->

        
    </section>
    <!-- //forms  -->

</div>
@endsection