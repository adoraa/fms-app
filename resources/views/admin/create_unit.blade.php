@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Unit</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Create Unit <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('unit.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="input__label">Name of Unit</label>
                        <input type="text" name="name" class="form-control input-style" id="name"
                            placeholder="Enter Unit Name" required>
                        
                    </div>
                   
                        <div class="form-group">
                            <label for="inputCorrespondingRole" class="input__label">Corresponding Role:</label>
                            <select id="inputCorrespondingRole" class="form-control input-style" name="role_id">
                                <option>-- Select Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->title }} </option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputHeadofUnit" class="input__label">Head of Unit</label>
                            <select id="inputHeadofUnit" class="form-control input-style" name="user_id">
                                <option>-- Select User --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->surname }}, {{ $user->firstname }} </option>
                                @endforeach
                                
                            </select>
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