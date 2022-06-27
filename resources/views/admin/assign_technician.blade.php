@extends('layouts.portal')
@section('content')
<div class="container-fluid content-top-gap">

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assign User</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- forms -->
    <section class="forms">
        <!-- forms 1 -->
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Assign Material <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('complaint.post_material', $complaint->id) }}" method="post">
                    @csrf    
                   
                        
                        
                            <div class="form-group">
                                <label for="selectMaterial" class="input__label"><b>Material</b> </label><br/>
                                <select id="selectMaterial" name="material_id" class="input__label">
                                    <option>-- Select Material--</option>
                                    @foreach ($materials as $material)
                                        <option value="{{ $material->id }}"> {{ $material->name }}({{ $material->quantity }} items)</option>    
                                    @endforeach
                                        
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name" class="input__label">Number of Items Needed</label>
                                <input type="number" name="quantity" class="form-control input-style" id="material_qty" min="1"
                                    placeholder="Enter Quantity required" required>
                                
                            </div>
                        

                    <button type="submit" class="btn btn-primary btn-style mt-6">Submit</button>
                </form>

                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>Material</th>
                          <th>Quantity</th>
                        
                          
                        </tr>
                      </thead>
                      <tbody>
                       
                        @foreach ($complaint_materials as $complaint_material)
                        <tr>
                            
                            <td>{{ $complaint_material->material->name }}</td>
                            <td>{{ $complaint_material->quantity }}</td>
                            
                        </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
            </div>
            </div>

            
        </div>

        <!-- //forms 2 -->

        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Assign User <span></span></h3>
            </div>
            <div class="card-body">
                @include('includes.errors')
                <form action="{{ route('complaint.post_technician', $complaint->id) }}" method="post">
                    @csrf    
                    <div class="row">
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
                                <label for="Job" class="input__label"><b>Job</b></label><br/>
                                <label>{{ $complaint->job->name }}</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="complaint" class="input__label"><b>Complaint</b></label><br/>
                                <label>{{ $complaint->description }}</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="selectTecchnicians" class="input__label"><b>User</b> </label><br/>
                                <select id="selectTecchnicians" name="user_assigned" class="input__label">
                                    <option>-- Select Technician--</option>
                                    @foreach ($technicians as $technician)
                                        <option value="{{ $technician->id }}"> {{ $technician->surname }}, {{ $technician->firstname }}</option>    
                                    @endforeach
                                        
                                </select>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-style mt-6">Assign Technician</button>
                </form>
            </div>
            </div>

            
        </div>
        
    </section>
    <!-- //forms  -->

</div>
@endsection