<aside class="left-sidebar bg-sidebar">
  @php
    $student   = Session::get('student');
  @endphp 
          <div id="sidebar" class="sidebar sidebar-with-footer overflow-auto">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/index.html" title="Sleek Dashboard">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33">
                  <g fill="none" fill-rule="evenodd">
                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name text-truncate">Student Dashboard</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="has-sub active expand">
                  <a class="sidenav-item-link" href="{{route('stuDashboard')}}" >
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span class="nav-text">Dashboard</span> <b class="caret"></b>
                  </a>
                </li>

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#components"
                    aria-expanded="false" aria-controls="components">
                    <i class="mdi mdi-folder-multiple-outline"></i>
                    <span class="nav-text">Profile</span> <b class="caret"></b>
                  </a>
                  <ul class="collapse " id="components" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('student_profile')}}">
                          <span class="nav-text">Student</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons"
                    aria-expanded="false" aria-controls="icons">
                    <i class="mdi mdi-settings"></i>
                    <span class="nav-text">Setting</span> <b class="caret"></b>
                  </a>
                  <ul class="collapse " id="icons" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('tution-fee')}}">
                          <span class="nav-text">Tution Fee</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('result')}}">
                          <span class="nav-text">Result</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
                
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#forms"
                    aria-expanded="false" aria-controls="forms">
                    <i class="mdi mdi-logout"></i>
                    <span class="nav-text text-danger text-bold">{{ $student->name }}</span><b class="caret"></b>
                  </a>
                  <ul class="collapse " id="forms" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                    <li class="dropdown-header">
                      </li>
                      <li class="dropdown-footer">
                        <a href="{{route('stuLogout')}}"> <i class="mdi mdi-logout"></i> Logout </a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </aside>