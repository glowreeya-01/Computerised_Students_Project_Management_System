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
                <h3 class="page-title">Edit Project</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.project') }}">Project</a></li>
                    <li class="breadcrumb-item active">Edit Project</li>
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
                        @method('PATCH')
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Repository Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">  
                                <div class="form-group">
                                    

                                    <label>File Name</label>
                                    <input type="text"name="filename" class="form-control @error('filename') is-invalid @enderror" value="{{ $project->filename }}">
                                    @error('filename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Recipients</label>
                                    <input type="text"name="recipient" class="form-control @error('recipient') is-invalid @enderror" value="{{ $project->recipient }}">
                                    @error('recipient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                            </div>
                           
                            <div class="col-12 col-sm-6">  
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text"name="created_at" disabled class="form-control @error('created_at') is-invalid @enderror"  value="{{ $project->created_at }}">
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
                                    <input type="text"name="comment" class="form-control @error('comment') is-invalid @enderror" value="{{ $project->comment }}">
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
                                    <select class="form-control @error('label') is-invalid @enderror" name="label" placeholder="Label">
                                        <option class="dropdown-item " >{{ $project->label }}</option>
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
                            <div class="col-12 col-sm-6">
                                <label>Status</label>
                                <div class="form-group">
                                    <select class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Label">
                                        @if ($project->status == 1)
                                        <option class="dropdown-item " >Submitted</option>
                                        @elseif ($project->status == 2)
                                        <option class="dropdown-item " >Approved</option>
                                        @else
                                        <option class="dropdown-item " >Rejected</option>
                                       @endif
                                        <option class="dropdown-item badge-warning" value="1">Submitted</option>
                                        <option class="dropdown-item badge-success" value="2">Approved</option>
                                        <option class="dropdown-item badge-danger" value="3">Rejected</option>
                                    </select>
                                    @error('status')
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
