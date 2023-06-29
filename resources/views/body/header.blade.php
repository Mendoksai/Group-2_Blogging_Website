<div class="header-top-area">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="header-top-wraper">
                  <div class="row">
                      <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                          <div class="menu-switcher-pro">
                              <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                <i class="educate-icon educate-nav"></i>
                              </button>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                          
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                          <div class="header-right-info">
                              <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                    @auth
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                
                                                <img src="{{ (!empty(auth()->user()->photo)) ? url('uploads/'.auth()->user()->photo) : url('uploads/no_image.jpg') }}" alt="" style="height: 30px; width:30px;"/>
                                                
                                                <span class="admin-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>{{ auth()->user()->email }}</a>
                                                </li>
                                                
                                                <li>
                                                    <form action="/logout" method="post">
                                                    @csrf
                                                        <button class=" mx-auto btn btn-dark" type="submit" style="margin: auto 20px; text-align-center; background:#000112; color:white;">Logout</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endauth
                                    @guest
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                            
                                            <span class="admin-name">Account</span>
                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                <li><a href="/login"><span class="edu-icon edu-home-admin author-log-ic"></span>Login</a>
                                                </li>
                                                <li><a href="/register"><span class="edu-icon edu-user-rounded author-log-ic"></span>Register</a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                    @endguest
                                  
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>