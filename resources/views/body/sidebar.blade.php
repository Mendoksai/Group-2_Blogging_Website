<div class="left-sidebar-pro">
  <nav id="sidebar" class="">
    {{-- - --}}
      <div class="sidebar-header">
          <a href="index.html"><img class="main-logo" src="{{ asset('uploads/PSU_BLOG.png') }}" height="70px" width="190px" style="margin-top:10px" alt="" /></a>
          <strong><a href="index.html"><img src="{{ asset('uploads/psu_logo.png') }}" height="40px" width="40px" alt="" /></a></strong>
      </div>


      <div class="left-custom-menu-adp-wrap comment-scrollbar">
          <nav class="sidebar-nav left-sidebar-menu-pro">
              <ul class="metismenu" id="menu1">
                  
                  <li>
                      <a title="Landing Page" href="/dashboard" aria-expanded="false"> <span class="educate-icon educate-home icon-wrap"></span></span> <span class="mini-click-non">Dashboard</span></a>
                  </li>
                  
                @auth 
                    @if(auth()->user()->account_role == 'Admin')
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Users</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="/admin/student/index"><span class="mini-sub-pro">All Users</span></a></li>
                                <li><a title="Add Students" href="/admin/student/create"><span class="mini-sub-pro">Add Users</span></a></li>
                                
                            </ul>
                        </li>
                    @endif
                @endauth
              </ul>
          </nav>
      </div>
  </nav>
</div>