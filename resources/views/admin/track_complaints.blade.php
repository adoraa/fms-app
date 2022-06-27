@extends('layouts.portal')
@section('content')

    
      <!-- content -->
      <div class="container-fluid content-top-gap">
    
        <!-- breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4">
          <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Track complaints</li>
          </ol>
        </nav>
        <!-- //breadcrumbs -->
    
        <!-- timeline -->
        <section class="template-cards">
          <div class="card card_border mb-5">
            <div class="cards__heading">
              <h3>Track complaints on <span>{{ $complaint->utility->name }}</span> <br/>
                <small>{{ $complaint->description }}</small></h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 pr-lg-2 chart-grid">
                  <div class="card text-center card_border">
                    <div class="card-header chart-grid__header">
                      Progress reports
                    </div>
                    <div class="card-body">
                      <div class="timeline">

                        @if ($complaint->time_job_rated != null)
                        <div class="entry">
                          <div class="title">
                            <?php $approved_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $complaint->time_job_rated);?>
                            <h3>{{ \Carbon\Carbon::parse($complaint->time_job_rated)->diffForHumans(); }}</h3>
                          </div>
                          <div class="body">
                            <h4 class="card__title">{{ $complaint->user->firstname }} {{ $complaint->user->surname }}</h4>
                            
                            <p>Job reviewed</p>

                          </div>
                        </div>
                        @endif

                        @if ($complaint->time_job_completed != null)
                        <div class="entry">
                          <div class="title">
                            <?php $approved_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $complaint->time_job_completed);?>
                            <h3>{{ \Carbon\Carbon::parse($complaint->time_job_completed)->diffForHumans(); }}</h3>
                          </div>
                          <div class="body">
                            <h4 class="card__title">{{ $complaint->assigned_user->firstname }} {{ $complaint->assigned_user->surname }}</h4>
                            
                            <p>Job completed</p>

                          </div>
                        </div>
                        @endif

                        @if ($complaint->time_reached != null)
                        <div class="entry">
                          <div class="title">
                            <?php $approved_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $complaint->time_reached);?>
                            <h3>{{ \Carbon\Carbon::parse($complaint->time_reached)->diffForHumans(); }}</h3>
                          </div>
                          <div class="body">
                            <h4 class="card__title">{{ $complaint->assigned_user->firstname }} {{ $complaint->assigned_user->surname }}</h4>
                            
                            <p>Technician arrived</p>

                          </div>
                        </div>
                        @endif
                
                        @if ($complaint->material_gotten != null)
                            <div class="entry">
                                <div class="title">
                                  <?php $approved_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $complaint->time_material_gotten);  ?>
                                <h3>{{ \Carbon\Carbon::parse($complaint->time_material_gotten)->diffForHumans();  }}</h3>
                                </div>
                                <div class="body">
                                <h4 class="card__title">{{ $complaint->store_manager->firstname }} {{ $complaint->store_manager->surname }}</h4>
                                
                                    <p>Material Approved</p>
                                    
                                </div>
                            </div>    
                        @endif

                        @if ($complaint->estate_manager_approval != null)
                            <div class="entry">
                                <div class="title">
                                  <?php $approved_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $complaint->time_estate_manager_approved);  ?>
                                <h3>{{ \Carbon\Carbon::parse($complaint->time_estate_manager_approved)->diffForHumans();  }}</h3>
                                </div>
                                <div class="body">
                                <h4 class="card__title">{{ $complaint->estate_manager->firstname }} {{ $complaint->estate_manager->surname }}</h4>
                                
                                    <p>Estate Manager Approval</p>
                                    
                                </div>
                            </div>    
                        @endif

                        @if ($complaint->user_assigned != null)
                            <div class="entry">
                                <div class="title">
                                  <?php $assigned_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $complaint->time_user_assigned);  ?>
                                <h3>{{ \Carbon\Carbon::parse($complaint->time_user_assigned)->diffForHumans();  }}</h3>
                                </div>
                                <div class="body">
                                <h4 class="card__title">{{ $complaint->head_of_unit->firstname }} {{ $complaint->head_of_unit->surname }}</h4>
                                
                                    <p>{{ $complaint->assigned_user->firstname }} {{ $complaint->assigned_user->surname }} has been Assigned</p>
                                    
                                </div>
                            </div>    
                        @endif

                        @if ($complaint->head_of_unit != null)
                            <div class="entry">
                                <div class="title">
                                  <?php $approved_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $complaint->time_head_of_unit_approved);  ?>
                                <h3>{{ \Carbon\Carbon::parse($complaint->time_head_of_unit_approved)->diffForHumans();  }}</h3>
                                </div>
                                <div class="body">
                                <h4 class="card__title">{{ $complaint->head_of_unit->firstname }} {{ $complaint->head_of_unit->surname }}</h4>
                                
                                    <p>Head of Unit Approval</p>
                                    
                                </div>
                            </div>    
                        @endif

                        @if ($complaint->head_of_user != null)
                            <div class="entry">
                                <div class="title">
                                  <?php $approved_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $complaint->time_head_of_user_approved);  ?>
                                <h3>{{ \Carbon\Carbon::parse($complaint->time_head_of_user_approved)->diffForHumans();  }}</h3>
                                </div>
                                <div class="body">
                                <h4 class="card__title">{{ $complaint->head_of_room_facility->firstname }} {{ $complaint->head_of_room_facility->surname }}</h4>
                                
                                    <p>Head of Room/Facility Approval</p>
                                    
                                </div>
                            </div>    
                        @endif

                        <div class="entry">
                          <div class="title">
                            <?php $approved_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $complaint->created_at);  ?>
                          <h3>{{ \Carbon\Carbon::parse($complaint->created_at)->diffForHumans();  }}</h3>
                          </div>
                          <div class="body">
                          <h4 class="card__title">{{ $complaint->user->firstname }} {{ $complaint->user->surname }}</h4>
                          
                              <p>Complaint Created</p>
                              
                          </div>
                      </div>   
    
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <!-- //timeline -->
    
      </div>
      <!-- //content -->
   
    
    @endsection