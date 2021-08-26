@extends('layouts.app')

@section('title')
 dash
@endsection




@section('content')

<div class="content container-fluid">
				
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Teachers Details</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('teacher.show') }}">Teachers</a></li>
                    <li class="breadcrumb-item active">Teachers Details</li>
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
                                        <span class="info-span">{{ $teacher->firstname }} {{ $teacher->lastname }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Teacher ID : </span>
                                        <span class="info-span">{{ $teacher->reg_no }} </span>
                                    </li>
                                    <li>
                                        <span class="title-span">Mobile : </span>
                                        <span class="info-span">{{ $teacher->profile->department }} </span>
                                    </li>
                                    <li>
                                        <span class="title-span">Email : </span>
                                        <span class="info-span">{{ $teacher->email }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Gender : </span>
                                        <span class="info-span">{{ $teacher->profile->gender }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">DOB : </span>
                                        <span class="info-span">{{ $teacher->profile->DoB }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Date Joined : </span>
                                        <span class="info-span">{{ $teacher->profile->created_at }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Department : </span>
                                        <span class="info-span">{{ $teacher->profile->department }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Qualification : </span>
                                        <span class="info-span">{{ $teacher->profile->qualification }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Area of Specialization : </span>
                                        <span class="info-span">{{ $teacher->profile->experience }}</span>
                                    </li>
                                    <li>
                                        <span class="title-span">Student : </span>
                                        <span class="info-span">{{ $teacher->student->firstname }} {{ $teacher->student->lastname }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <p>{{ $teacher->profile->bio }}</p>
                            </div>                                            
                        </div>
                    
                        
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5>Permanent Address</h5>
                                <p>{{ $teacher->profile->address }}, {{ $teacher->profile->city }}, {{ $teacher->profile->state }}</p>
                            </div>                                            
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5>Present Address</h5>
                                <p>{{ $teacher->profile->address }}, {{ $teacher->profile->city }}, {{ $teacher->profile->state }}</p>
                            </div>                                            
                        </div>
                    </div>
                </div>								
            </div>

            

            
        </div>
    </div>				
</div>

@endsection


@section('script')

@endsection
