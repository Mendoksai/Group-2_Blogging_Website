<div class="mobile-menu-area">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="mobile-menu">
                  <nav id="dropdown">
                      <ul class="mobile-menu-nav">
                          
                          <li><a href="/">Dashboard</a></li>
                          
                          @auth
                            @if(auth()->user()->account_role == 'admin') 
                              <li><a data-toggle="collapse" data-target="#demopro" href="#">Students <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                  <ul id="demopro" class="collapse dropdown-header-top">
                                      <li><a href="all-students.html">All Students</a>
                                      </li>
                                      <li><a href="add-student.html">Add Student</a>
                                      </li>
                                      <li><a href="edit-student.html">Edit Student</a>
                                      </li>
                                      <li><a href="student-profile.html">Student Profile</a>
                                      </li>
                                  </ul>
                              </li>
                            @endif
                          @endauth
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </div>
</div>