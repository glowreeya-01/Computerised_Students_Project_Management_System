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
                <h3 class="page-title">Students</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Students</li>
                </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
                {{-- <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a> --}}
                <a href="{{ route('admin.student.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                    <th>Student Id</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Mobile No</th>
                                    <th>Topic</th>
                                    <th>No of Files</th>
                                    <th>status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($students as $student)
                                    
                                <tr>
                                    <td>
                                        <h2>
                                            <a>{{ $student->firstname }} {{ $student->lastname }}</a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2>
                                            <a>{{ $student->reg_no }}</a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2>
                                            <a>{{ $student->profile->gender }}</a>
                                        </h2>
                                    </td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->profile->department }}</td>
                                    <td>{{ $student->profile->phone }}</td>
                                    <td>{{ $student->profile->topic }}</td>
                                    <td>{{ $student->project->count() }}</td>
                                   
                                    <td>
                                        @if ($student->status == 2)
                                        <span class="badge badge-warning">InActive</span>
                                        
                                        @elseif ($student->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                           
                                        <span class="badge badge-danger">Delete</span>
                                       @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="actions">
                                            
                                            <a href="{{ route('admin.student.show', $student->id) }}" class="btn btn-sm bg-warning mr-2">
                                                <i class="fas fa-user"></i>
                                            </a>
                                            <a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-sm bg-success-light mr-2">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            
                                            {{-- <form id="delete-form" action="{{ route('admin.student.delete', $student->id) }}" method="POST" style="display: inline-block;" >
                                                @csrf
                                                @method('delete')
                                                
                                                <button type="submit"  class="btn btn-sm bg-danger"><i class="fas fa-trash"></i></button>
                                            </form> --}}
                                            <button id="deleteBtn" type=""  data-attr="{{ route('admin.student.delete', $student->id) }}" class="btn btn-sm bg-danger"><i class="fas fa-trash"></i></button>
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
    
            let token = $('meta[name="csrf-token"]').content
            // let token = {{ csrf_token() }}
            console.log(token);
            let href = $(this).attr('data-attr');
            $.ajax({
                url : href,
                type: 'DELETE',

                
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                
                success: function (data) {
                    // console.log(data);
                    location.reload();
                },
                error: function (error) {
                    // console.log('error');
                    console.log(error);
                    
                }
            })
            

           
        } else {
            
        }
    })
	
	



</script>

@endsection
