@extends('layouts.app')

@section('title')
 profile
@endsection




@section('content')

<div class="content container-fluid">
					
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" alt="User Image" src="{{ $profileImage }}">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">{{ $user->firstname }} {{ $user->lastname }}</h4>
                        <h6 class="text-muted">Administrator</h6>
                        <div class="user-Location"><i class="fas fa-map-marker-alt"></i> {{ $user->profile->address }}</div>
                        <div class="about-text">{{ $user->profile->bio }}</div>
                    </div>
                    <div class="col-auto profile-btn">
                        
                        <a href="{{ route('admin.edit') }}" class="btn btn-primary">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                    </li>
                </ul>
            </div>	
            <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">
                
                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Personal Details</span> 
                                        {{-- <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="far fa-edit mr-1"></i>Edit</a> --}}
                                    </h5>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        @if(Session::has('message'))
                                        <p class="alert alert-success">{{session::get('message')}}</p>
                                        @endif
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                        <p class="col-sm-9">{{ $user->firstname }} {{ $user->lastname }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Gender</p>
                                        <p class="col-sm-9">{{ $user->profile->gender }} </p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                        <p class="col-sm-9">{{ $user->profile->DoB }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                        <p class="col-sm-9">{{ $user->email }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                        <p class="col-sm-9">{{ $user->profile->phone }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
                                        <p class="col-sm-9 mb-0">{{ $user->profile->address }}<br>
                                            {{ $user->profile->city }},<br>
                                            {{ $user->profile->state }} - {{ $user->profile->zipcode }},<br>
                                            {{ $user->profile->country }}.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-lg-3">
                            
                            <!-- Account Status -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Account Status</span>
                                        {{-- <a class="edit-link" href="#"><i class="far fa-edit mr-1"></i> Edit</a> --}}
                                    </h5>
                                    @if ($user->status == 1)
                                        
                                    <button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> Active</button>
                                    @else
                                    <button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> InActive</button>
                                        
                                    @endif
                                </div>
                            </div>
                            <!-- /Account Status -->

                            <!-- Skills -->
                            {{-- <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Skills </span> 
                                    </h5>
                                    <div class="skill-tags">
                                        <span>Html5</span>
                                        <span>CSS3</span>
                                        <span>WordPress</span>
                                        <span>Javascript</span>
                                        <span>Android</span>
                                        <span>iOS</span>
                                        <span>Angular</span>
                                        <span>PHP</span>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- /Skills -->

                        </div>
                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->
                
                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        @if(Session::has('message'))
                                        <p class="alert alert-success">{{session::get('message')}}</p>
                                        @endif
                                    <form action="/change-password" method="post">
                                        @csrf
                                        <div class="form-group">
                                            
                                            <label>Old Password</label>
                                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror">
                                            @error('old_password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Change Password Tab -->
                
            </div>
        </div>
    </div>

</div>

@endsection


@section('script')

@endsection
