@extends('layouts.main_layout')
@section('content')

<div class="program-widget-bc mg-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
        @if(session()->has('success'))

        
          <div class="col-md-12 text-center">
            <div class="alert alert-success">
              {{ session('success') }} 
            </div>
            
          </div>
      @endif

      @if($errors->any())
          @foreach ($errors->all() as $error)
            
            <div class="col-md-12 text-center">
              <div class="alert alert-danger">
                {{ $error }}
              </div>
              
            </div>
          @endforeach
          
      @endif
    </div>

      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="hpanel shadow-inner responsive-mg-b-30">
                  <div class="panel-body">
                      <div class="table-responsive wd-tb-cr">
                          <table class="table table-striped">
                              <thead>
                                  <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Student Instructor Id</th>
                                      <th>Email</th>
                                      <th>Degree Name</th>
                                      <th colspan="2">Actions</th>
                                  </tr>
                              </thead>


                              <tbody>
                                @if(empty($students))
                                    <tr>
                                        <td>
                                            No Results Found
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                {{ $student->first_name }}
                                            </td>
                                            <td>
                                                {{ $student->last_name }}
                                            </td>
                                            <td>
                                                {{ $student->student_instructor_id }}
                                            </td>
                                            <td>
                                                {{ $student->email }}
                                            </td>
                                            <td>
                                                {{ $student->degree_name }}
                                            </td>
                                            <td>
                                                <a href="/admin/student/update/{{ $student->id }}" style="color:white; margin:0;" class="btn btn-primary">Update</a>
                                            </td>
                                            <td>
                                                <form action="/admin/student/delete" method="post">
                                                    @csrf 
                                                    <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                                
                                            </td>

                                        </tr>
                                    @endforeach
                                    

                                @endif
                                  
                                  
                              </tbody>



                          </table>
                      </div>
                  </div>
              </div>
          </div>
          
      </div>
  </div>
</div>

@endsection