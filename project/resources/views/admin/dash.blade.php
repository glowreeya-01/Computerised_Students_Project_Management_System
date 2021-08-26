@extends('layouts.app')

@section('title')
 dash
@endsection




@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome Admin!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- Overview Section -->
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-one">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="db-info">
                            <h3>{{ $students->count() }}</h3>
                            <h6>Students</h6>
                        </div>										
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-two">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="db-info">
                            <h3>{{ $projects->count() }}</h3>
                            <h6>Projects</h6>
                        </div>										
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-three">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="db-info">
                            <h3>5</h3>
                            <h6>Department</h6>
                        </div>										
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-four">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="db-info">
                            <h3>{{ $teachers->count() }}</h3>
                            <h6>Lecturer</h6>
                        </div>										
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Overview Section -->				

    
    
    <div class="row">
        <div class="col-md-6 d-flex">						
            <!-- Star Students -->
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title">Star Students</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th class="text-center">Marks</th>
                                    <th class="text-center">Percentage</th>
                                    <th class="text-right">Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    
                                <tr>
                                    <td class="text-nowrap">
                                        <div>{{ $student->reg_no }}</div>
                                    </td>
                                    <td class="text-nowrap">{{ $student->firstname }} {{ $student->lastname }}</td>
                                    <td class="text-center">1185</td>
                                    <td class="text-center">98%</td>
                                    <td class="text-right">
                                        <div>2019</div>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Star Students -->							
        </div>

        <div class="col-md-6 d-flex">						
            <!-- Feed Activity -->
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title">Student Activity</h5>
                </div>
                <div class="card-body">
                    <ul class="activity-feed">




                        



                        <li class="feed-item">
                            <div class="feed-date">Apr 13</div>
                            <span class="feed-text"><a>John Joshua</a> won 1st place in <a>"Chess"</a></span>
                        </li>
                        <li class="feed-item">
                            <div class="feed-date">Mar 21</div>
                            <span class="feed-text"><a>Justin Obinna</a> participated in <a href="invoice.html">"Carrom"</a></span>
                        </li>
                        <li class="feed-item">
                            <div class="feed-date">Feb 2</div>
                            <span class="feed-text"><a>Justin Obinna</a> attended internation conference in <a href="profile.html">"St.John School"</a></span>
                        </li>
                        <li class="feed-item">
                            <div class="feed-date">Apr 13</div>
                            <span class="feed-text"><a>John Joshua</a> won 1st place in <a>"Chess"</a></span>
                        </li>
                        <li class="feed-item">
                            <div class="feed-date">Mar 21</div>
                            <span class="feed-text"><a>Justin Obinna</a> participated in <a href="invoice.html">"Carrom"</a></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Feed Activity -->							
        </div>
    </div>

    <!-- Socail Media Follows -->
    {{-- <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card flex-fill fb sm-box">
                <i class="fab fa-facebook"></i>
                <h6>50,095</h6>
                <p>Likes</p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card flex-fill twitter sm-box">
                <i class="fab fa-twitter"></i>
                <h6>48,596</h6>
                <p>Follows</p>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card flex-fill insta sm-box">
                <i class="fab fa-instagram"></i>
                <h6>52,085</h6>
                <p>Follows</p>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card flex-fill linkedin sm-box">
                <i class="fab fa-linkedin-in"></i>
                <h6>69,050</h6>
                <p>Follows</p>
            </div>
        </div>
    </div> --}}
    <!-- /Socail Media Follows -->
</div>
@endsection


@section('script')

@endsection
