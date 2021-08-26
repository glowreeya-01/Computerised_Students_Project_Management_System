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
                <h3 class="page-title">New Project</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></li>
                    <li class="breadcrumb-item active">Add New</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
        
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Project Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">  
                                <div class="form-group">
                                    <label>File Name</label>
                                    <input type="text" name="filename" class="form-control @error('filename') is-invalid @enderror" >
                                    @error('filename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @if ($user->isAdmin == 1)
                            <div class="col-12 col-sm-6">  
                                <div class="form-group">
                                    <label>Topic</label>
                                        
                                    <input type="text" name="topic"  class="form-control @error('topic') is-invalid @enderror" value="{{ $user->profile->topic }}" >
                                    @error('topic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                             @else
                                        
                                    <input type="text" name="topic" hidden class="form-control @error('topic') is-invalid @enderror" value="{{ $user->profile->topic }}" >
                             @endif
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Recipient</label>
                                    <input type="text" name="recipient" class="form-control @error('recipient') is-invalid @enderror" value="{{ $user->teacher->firstname }} {{ $user->teacher->lastname }}" >
                                    @error('recipient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>File</label>
                                    
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">  
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="created_at" disabled class="form-control @error('created_at') is-invalid @enderror" >
                                    @error('created_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Comment</label>
                                    <input type="text" name="comment" class="form-control @error('comment') is-invalid @enderror" >
                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Label</label>
                                <div class="form-group">
                                    <select class="form-control @error('label') is-invalid @enderror" name="label" placeholder="Role">
                                        <option class="dropdown-item badge-success" value="Chapter">Chapter</option>
                                        <option class="dropdown-item badge-info" value="Journal">Journal</option>
                                        <option class="dropdown-item badge-dark" value="Resources">Resources</option>
                                        <option class="dropdown-item badge-danger" value="Attachment">Attachment</option>
                                        <option class="dropdown-item badge-warning" value="Instrument">Instrument</option>
                                    </select>
                                    @error('label')
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
