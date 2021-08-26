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
                <h3 class="page-title">Teachers</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Teachers</li>
                </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
                {{-- <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a> --}}
                <a href="{{ route('admin.teacher.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                    <th>Full Name</th>
                                    <th>Teacher Id</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Mobile No</th>
                                    <th>Qualification</th>
                                    <th>No of Files</th>
                                    <th>status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($teachers as $teacher)
                                    
                                <tr>
                                    <td>
                                        <h2>
                                            <a>{{ $teacher->firstname }} {{ $teacher->lastname }}</a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2>
                                            <a>{{ $teacher->reg_no }}</a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2>
                                            <a>{{ $teacher->profile->gender }}</a>
                                        </h2>
                                    </td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->profile->department }}</td>
                                    <td>{{ $teacher->profile->gender }}</td>
                                    <td>{{ $teacher->profile->topic }}</td>
                                    <td>{{ ($teacher->project->count())? $teacher->project->count() : ''  }}</td>
                                   
                                    <td>
                                        @if ($teacher->status == 2)
                                        <span class="badge badge-warning">InActive</span>
                                        
                                        @elseif ($teacher->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                           
                                        <span class="badge badge-danger">Delete</span>
                                       @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="actions">
                                            <a href="{{ route('admin.teacher.show', $teacher->id) }}" class="btn btn-sm bg-warning mr-2">
                                                <i class="fas fa-user"></i>
                                            </a>
                                            <a href="{{ route('admin.teacher.edit', $teacher->id) }}" class="btn btn-sm bg-success-light mr-2">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            
                                            {{-- <form id="delete-form" action="{{ route('admin.teacher.delete', $teacher->id) }}" method="POST" style="display: inline-block;" >
                                                @csrf
                                                @method('delete')
                                                
                                                <button type="submit"  class="btn btn-sm bg-danger"><i class="fas fa-trash"></i></button>
                                            </form> --}}
                                            <button id="deleteBtn" type=""  data-attr="{{ route('admin.teacher.delete', $teacher->id) }}" class="btn btn-sm bg-danger"><i class="fas fa-trash"></i></button>
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
