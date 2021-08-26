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
                <h3 class="page-title">Search Projects</h3>
                <ul class="breadcrumb">
                    @if ($user->isAdmin)
                        
                    <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Dashboard</a></li>
                    @else
                        
                    <li class="breadcrumb-item"><a href="{{ route('dash') }}">Dashboard</a></li>
                    @endif
                    <li class="breadcrumb-item active">Search Projects</li>
                </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
                {{-- <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a> --}}
                @if ($user->isAdmin)
                    
                <a href="{{ route('admin.project.new') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                @else
                    
                <a href="{{ route('project.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                @endif
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
            @if(Session::has('message'))
            <p class="alert alert-success">{{session::get('message')}}</p>
            @endif 
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Owner</th>
                                    <th>File Name</th>
                                    <th>Recipient</th>
                                    <th>Topic</th>
                                    <th>File</th>
                                    <th>Date</th>
                                    <th>Comment</th>
                                    <th>Label</th>
                                    <th>status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                {{-- @foreach ($topics as $topic)
                                    
                                <tr>
                                    <td>
                                        <h2>
                                            <a>{{ $project->user->firstname }}</a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2>
                                            <a>{{ $project->filename }}</a>
                                        </h2>
                                    </td>
                                    <td>{{ $project->recipient }}</td>
                                    <td>{{ $project->topic }}</td>
                                    <td type="file"> {{ $project->file }}</td>
                                    <td>{{ $project->created_at }}</td>
                                    <td>{{ $project->comment }}</td>
                                    <td>
                                        <span class="badge badge-success">{{ $project->label }}</span>
                                    </td>
                                    <td>
                                        @if ($project->status == 1)
                                        <span class="badge badge-warning">Submitted</span>
                                        
                                        @elseif ($project->status == 2)
                                        <span class="badge badge-success">Approved</span>
                                        @else
                                           
                                        <span class="badge badge-danger">Dennied</span>
                                       @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="actions">
                                            <a href="{{ asset('files/'. $project->file) }}" class="btn btn-sm bg-warning mr-2">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <form action="{{ route('request', $project->filename) }}" method="post" style="display: inline-block">
                                                @csrf
                                            
                                                <button href="{{ route('request', $project->filename) }}" type="submit" class="btn btn-sm bg-warning mr-2">
                                                    <i class="fas fa-book"> Request</i>
                                                </button>
                                            </form>
                                            @if ($user->isAdmin)
                                                
                                            <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm bg-success-light mr-2">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            @endif
                                           
                                        </div>
                                    </td>
                                </tr>
                                @endforeach --}}
                                
                                @foreach ($projects as $project)
                                    
                                <tr>
                                    <td>
                                        <h2>
                                            <a>{{ $project->user->firstname }}</a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2>
                                            <a>{{ $project->filename }}</a>
                                        </h2>
                                    </td>
                                    <td>{{ $project->recipient }}</td>
                                    <td>{{ $project->topic }}</td>
                                    <td type="file"> {{ $project->file }}</td>
                                    <td>{{ $project->created_at }}</td>
                                    <td>{{ $project->comment }}</td>
                                    <td>
                                        <span class="badge badge-success">{{ $project->label }}</span>
                                    </td>
                                    <td>
                                        @if ($project->status == 1)
                                        <span class="badge badge-warning">Submitted</span>
                                        
                                        @elseif ($project->status == 2)
                                        <span class="badge badge-success">Approved</span>
                                        @else
                                           
                                        <span class="badge badge-danger">Dennied</span>
                                       @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="actions">
                                            {{-- <a href="{{ asset('files/'. $project->file) }}" class="btn btn-sm bg-warning mr-2">
                                                <i class="fas fa-download"></i>
                                            </a> --}}
                                            <form action="{{ route('request', $project->filename) }}" method="post" style="display: inline-block">
                                                @csrf
                                            
                                                <button href="{{ route('request', $project->filename) }}" type="submit" class="btn btn-sm bg-warning mr-2">
                                                    <i class="fas fa-book"> Request</i>
                                                </button>
                                            </form>
                                            @if ($user->isAdmin)
                                                
                                            <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm bg-success-light mr-2">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            @endif
                                           
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>							
        </div>					
    </div>					
</div>

@endsection


@section('script')

@endsection
