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
                <h3 class="page-title">Add Event</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="event.html">Events</a></li>
                    <li class="breadcrumb-item active">Add Event</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
        
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Event Information</span></h5>
                            </div>
                            
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control @error('label') is-invalid @enderror" name="category" >
                                        <option class="dropdown-item " value="">Select Category</option>
                                        <option class="dropdown-item bg-danger" value="bg-danger">Danger</option>
                                        <option class="dropdown-item bg-success" value="bg-success">Success</option>
                                        <option class="dropdown-item bg-purple" value="bg-purple">Purple</option>
                                        <option class="dropdown-item bg-primary" value="bg-primary">Primary</option>
                                        <option class="dropdown-item bg-info" value="bg-info">Info</option>
                                        <option class="dropdown-item bg-warning" value="bg-warning">warning</option>
                                    </select>
                                    @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Event Date</label>
                                    <input type="date" name="start" class="form-control">
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
