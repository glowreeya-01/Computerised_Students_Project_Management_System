@extends('layouts.app')

@section('title')
 dash
@endsection




@section('content')
<div class="content container-fluid">
				
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Student Details</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('student.show') }}">Student</a></li>
                    <li class="breadcrumb-item active">Student Details</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-info">
                        <h4>About Me</h4>
                        
                        <div class="media mt-3">
                            
                            <img src="{{ $profileImage }}" class="mr-3" alt="...">
                                
                            <div class="media-body">
                                <ul>
                                    <li>
                                        <span class="title-span">Full Name : </span>
                                        <span class="info-span">{{ $user->firstname }} {{ $user->lastname }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Department : </span>
                                        <span class="info-span">{{ $user->profile->department }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Student Id : </span>
                                        <span class="info-span">{{ $user->reg_no }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span"> School Email : </span>
                                        <span class="info-span">{{ $user->email }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Gender : </span>
                                        
                                        <span class="info-span">{{ $user->profile->department }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Date of Birth : </span>
                                        <span class="info-span">{{ $user->profile->DoB }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Joining Date : </span>
                                        <span class="info-span">{{ $user->profile->created_at }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Mobile No : </span>
                                        <span class="info-span">{{ $user->profile->phone }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span"> No of files : </span>
                                        <span class="info-span">{{ $user->project->count() }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Supervisor: </span>
                                        <span class="info-span">{{ $user->teacher->firstname }} {{ $user->teacher->lastname  }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Project topic: </span>
                                        <span class="info-span">{{ $user->profile->topic }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <p>{{ $user->profile->bio }}</p>
                            </div>                                            
                        </div>
                        
                        {{-- <div class="row follow-sec">
                            <div class="col-md-4 mb-3">
                                <div class="blue-box">
                                    <h3>2850</h3>
                                    <p>Followers</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="blue-box">
                                    <h3>2050</h3>
                                    <p>Following</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="blue-box">
                                    <h3>2950</h3>
                                    <p>Friends</p>
                                </div>
                            </div>
                        </div> --}}
                        
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5>Permanent Address</h5>
                                <p>{{ $user->profile->address }}, {{ $user->profile->city }}, {{ $user->profile->state }}</p>
                            </div>                                            
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5>Present Address</h5>
                                <p>{{ $user->profile->address }}, {{ $user->profile->city }}, {{ $user->profile->state }}</p>
                            </div>                                            
                        </div>
                    </div>
                </div>								
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                   
                </div>
            </div>

            {{-- <div class="row mt-2">
                <div class="col-md-12">
                    <div class="skill-info">
                        <h4>Settings</h4>

                        <form>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">  
                                    <div class="form-group">
                                        <label>School Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">  
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">  
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>				
</div>
@endsection


@section('script')

@endsection
