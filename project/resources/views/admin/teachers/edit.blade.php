@extends('layouts.app')

@section('title')
 dash
@endsection




@section('content')

<div class="content container-fluid">
				
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Edit Teacher</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('teacher.show') }}">Teacher</a></li>
                    <li class="breadcrumb-item active">Edit Teacher</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
            @if(Session::has('message'))
            <p class="alert alert-success">{{session::get('message')}}</p>
            @endif 
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Basic Details</span></h5>
                            </div>
                            
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                   

                                    <label>First Name</label>
                                    <input type="text" name="firstname" class="form-control  @error('firstname') is-invalid @enderror" value="{{ $teacher->firstname }}">
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ $teacher->lastname }}">
                                     @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">  
                                <div class="form-group">
                                    <label>Teacher ID</label>
                                    <input type="text" name="reg_no" class="form-control @error('reg_no') is-invalid @enderror" value="{{ $teacher->reg_no }}">
                                     @error('reg_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">  
                                <div class="form-group">
                                    <label>School Email</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $teacher->email }}">
                                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                        <option>{{ $teacher->profile->gender }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        {{-- <option>Others</option> --}}
                                    </select>
                                     @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="text" name="DoB" class="form-control @error('DoB') is-invalid @enderror" value="{{ $teacher->profile->DoB }}">
                                     @error('DoB')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $teacher->profile->phone }}">
                                     @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Joining Date</label>
                                    <input type="text" name="created_at" disabled class="form-control @error('created_at') is-invalid @enderror" value="{{ $teacher->profile->created_at }}">
                                     @error('created_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input class="form-control @error('department') is-invalid @enderror" name="department" type="text" value="{{ $teacher->profile->department }}">
                                     @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Qualification</label>
                                    <input class="form-control @error('qualification') is-invalid @enderror" name="qualification" type="text" value="{{ $teacher->profile->qualification }}">
                                     @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Area of Specialization</label>
                                    <input class="form-control @error('firstname') is-invalid @enderror" name="experience" type="text" value="{{ $teacher->profile->experience }}">
                                     @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                <label>Teacher Image</label>
                                    <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror" >
                                    @error('image')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                </div>
                            </div>

                            <div class="col-12 ">
                                <div class="form-group">
                                <label>Bio</label>
                                    <input type="text" name="bio" class="form-control @error('bio') is-invalid @enderror" value="{{ $teacher->profile->bio }}">
                                     @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label>Student</label>
                                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" >
                                        <option value="{{ $teacher->user_id }}">{{ $teacher->student->firstname }} {{ $teacher->student->lastname }} </option>
                                        
                                        @foreach ($students as $student)
                                            
                                        <option value="{{ $student->id }}">{{ $student->firstname }} {{ $student->lastname }}</option>
                                        @endforeach

                                    </select>
                                    @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="form-title"><span>Address</span></h5>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                <label>Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $teacher->profile->address }}">
                                     @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $teacher->profile->city }}">
                                     @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ $teacher->profile->state }}">
                                     @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" value="{{ $teacher->profile->zipcode }}">
                                     @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ $teacher->profile->country }}">
                                     @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>					
    </div>					
</div>

@endsection


@section('script')

@endsection
