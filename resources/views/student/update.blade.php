@extends('layouts.main_layout')
@section('content')

 <!-- Single pro tab review Start-->
 <div class="single-pro-review-area mt-t-30 mg-b-15">
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
              <div class="product-payment-inner-st">
                  <ul id="myTabedu1" class="tab-review-design">
                      <li class="active"><a href="#description">Update Student</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content custom-product-edit">
                      <div class="product-tab-list tab-pane fade active in" id="description">
                          <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="review-content-section">
                                      <div id="dropzone1" class="pro-ad">

                                          <form action="/admin/student/update_store" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $student->id }}">
                                              <div class="row">
                                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="first_name" value="{{ $student->first_name }}" type="text" class="form-control" placeholder="First Name" required>
                                                        </div>
                                                      </div>
                                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="last_name" value="{{ $student->last_name }}" type="text" class="form-control" placeholder="Last Name" required>
                                                        </div>
                                                      </div>

                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                          <input name="student_instructor_id" value="{{ $student->student_instructor_id }}" type="number" class="form-control" placeholder="Student Instructor Id" required>
                                                        </div>
                                                      </div>

                                                      
                                                      
                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                          <input name="degree_name" value="{{ $student->degree_name }}" type="text" class="form-control" placeholder="Degree Name" required>
                                                        </div>
                                                      </div>
                                                      
                                                      

                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                          <input name="email" value="{{ $student->email }}" type="email" class="form-control" placeholder="Email" required>
                                                        </div>
                                                      </div>

                                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="password" type="password" class="form-control" placeholder="Enter Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" oninput="checkPasswordStrength(this.value)" required>
                                                        </div>
                                                        <div class="form-group">
                                                          
                                                          <p id="password-strength-feedback" style="color:red;"></p> 
                                                        </div>
                                                      </div>
                                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="password_confirmation" type="password" class="form-control" placeholder="Re-enter Password" required>
                                                        </div>
                                                      </div>


                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group ">
                                                          <label for="photo">Student Profile Photo</label>
                                                          <input class="form-control" name="photo"  type="file"/>
                                                         
                                                        </div>
                                                      </div>
                                                      
                                                      

                                                  </div>
                                                  
                                              </div>
                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="payment-adress">
                                                          <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </form>


                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<script>
  function checkPasswordStrength(password) {
      var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      var strength = 0;

      // Check if password matches the required pattern
      if (!pattern.test(password)) {
          document.getElementById('password-strength-feedback').textContent = 'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, 1 special character, and be at least 8 characters long.';
          return;
      }

      // Check if password contains uppercase letters
      if (/[A-Z]/.test(password)) {
          strength++;
      }

      // Check if password contains lowercase letters
      if (/[a-z]/.test(password)) {
          strength++;
      }

      // Check if password contains numbers
      if (/[0-9]/.test(password)) {
          strength++;
      }

      // Check if password contains special characters
      if (/[^A-Za-z0-9]/.test(password)) {
          strength++;
      }

      // Update the feedback element based on the password strength
      var feedbackElement = document.getElementById('password-strength-feedback');

      if (strength === 0) {
          feedbackElement.textContent = '';
      } else if (strength <= 2) {
          feedbackElement.textContent = 'Weak';
          feedbackElement.style.color = 'red';
      } else if (strength === 3) {
          feedbackElement.textContent = 'Moderate';
          feedbackElement.style.color = 'orange';
      } else {
          feedbackElement.textContent = 'Strong';
          feedbackElement.style.color = 'green';
      }
  }
</script>
@endsection