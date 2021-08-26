@extends('layouts.app')

@section('title')
 dash
@endsection

@section('style')

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
<!-- Full Calander CSS -->
<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">


@endsection




@section('content')

<div class="content container-fluid">
				
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Events</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Events</li>
                </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
                <a href="{{ route('event.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                    <th>Tile</th>
                                    <th>Start</th>
                                    <th>Category</th>
                                    <th>Created</th>
                                    {{-- <th class="text-right">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($events as $event)
                                    
                                <tr>
                                    <td>
                                        <h2>
                                            <a>{{ $event->user->firstname }}</a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2>
                                            <a>{{ $event->title }}</a>
                                        </h2>
                                    </td>
                                    <td>{{ $event->start }}</td>
                                    {{-- <td type="file"> {{ $project->file }}</td> --}}
                                    {{-- <td>{{ $project->comment }}</td> --}}
                                    {{-- <td>
                                        <span class="badge badge-success">{{ $project->label }}</span>
                                    </td> --}}
                                    <td>
                                        @if ($event->category == 'bg-danger')
                                        <span class="badge bg-danger">Danger</span>
                                        
                                        @elseif ($event->category == 'bg-success')
                                        <span class="badge bg-success">Success</span>
                                        @elseif ($event->category == 'bg-warning')
                                        <span class="badge bg-warning">Warning</span>
                                        @elseif ($event->category == 'bg-purple')
                                        <span class="badge bg-purple">purple</span>
                                        @elseif ($event->category == 'bg-primary')
                                        <span class="badge bg-primary">Primary</span>
                                        @elseif ($event->category == 'bg-info')
                                        <span class="badge bg-info">info</span>
                                        @else
                                           
                                        <span class="badge bg-danger">Danger</span>
                                       @endif
                                    </td>
                                    <td>{{ $event->created_at }}</td>
                                    {{-- <td class="text-right">
                                        <div class="actions">
                                            <a href="{{ asset('files/'. $project->file) }}" target="_blank" class="btn btn-sm bg-warning mr-2">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm bg-success-light mr-2">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            
                                            
                                            <button id="deleteBtn" type=""  data-attr="{{ route('admin.project.delete', $project->id) }}" class="btn btn-sm bg-danger"><i class="fas fa-trash"></i></button>
                                            
                                        </div>
                                    </td> --}}
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
<!-- Datetimepicker JS -->
{{-- <script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Full Calendar JS -->
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/plugins/fullcalendar/jquery.fullcalendar.js"></script> --}}
<script>
    
</script>

@endsection
