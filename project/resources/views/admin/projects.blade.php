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
                <h3 class="page-title">Projects</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Projects</li>
                </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
                {{-- <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a> --}}
                <a href="{{ route('admin.project.new') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                           
                                        <span class="badge badge-danger">Rejected</span>
                                       @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="actions">
                                            <a href="{{ asset('files/'. $project->file) }}" target="_blank" class="btn btn-sm bg-warning mr-2">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm bg-success-light mr-2">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            
                                            
                                            <button id="deleteBtn" type=""  data-attr="{{ route('admin.project.delete', $project->id) }}" class="btn btn-sm bg-danger"><i class="fas fa-trash"></i></button>
                                            
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
<script>
   
    $(document).on('click', '#deleteBtn', function (event) {
        event.preventDefault();
        if (confirm('Are You Sure You Want To delete This?') ) {
    
            let href = $(this).attr('data-attr');
            $.ajax({
                url : href,
                type: 'DELETE',
                
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                
                success: function (data) {
                    // console.log('success');
                    location.reload();
                },
                error: function (error) {
                    console.log('error');
                    
                }
            })
            

           
        } else {
            
        }
    })
	
	



</script>

@endsection
