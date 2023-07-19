<aside class="left-sidebar bg-sidebar">
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
                <span class="brand-name text-truncate">Admin Dashboard</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="has-sub active expand">
                  <a class="sidenav-item-link" href="{{route('dashboard')}}" >
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span class="nav-text">Dashboard</span> <b class="caret"></b>
                  </a>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#add_class"
                    aria-expanded="false" aria-controls="components">
                    <i class="mdi mdi-folder-multiple-outline"></i>
                    <span class="nav-text">Class</span> <b class="caret"></b>
                  </a>
                  <ul class="collapse " id="add_class" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('class')}}">
                          <span class="nav-text">Add Class</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('manage-class')}}">
                          <span class="nav-text">Class Manage</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#sub"
                    aria-expanded="false" aria-controls="components1">
                    <i class="mdi mdi-folder-multiple-outline"></i>
                    <span class="nav-text">Subject</span> <b class="caret"></b>
                  </a>
                  <ul class="collapse " id="sub" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('subject')}}">
                          <span class="nav-text">Add Subject</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('all-student')}}">
                          <span class="nav-text">Manage Subject</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#components"
                    aria-expanded="false" aria-controls="components">
                    <i class="mdi mdi-folder-multiple-outline"></i>
                    <span class="nav-text">Student</span> <b class="caret"></b>
                  </a>
                  <ul class="collapse " id="components" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('add-student')}}">
                          <span class="nav-text">Add Student</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('all-student')}}">
                          <span class="nav-text">All Student</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons"
                    aria-expanded="false" aria-controls="icons">
                    <i class="mdi mdi-diamond-stone"></i>
                    <span class="nav-text">Result Manager</span> <b class="caret"></b>
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
                    <i class="mdi mdi-email-mark-as-unread"></i>
                    <span class="nav-text">Course</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="forms" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('six')}}">
                          <span class="nav-text">Six</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('seven')}}">
                          <span class="nav-text">Seven</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('eight')}}">
                          <span class="nav-text">Eight</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('nine')}}">
                          <span class="nav-text">Nine</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('ten')}}">
                          <span class="nav-text">Ten</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('ten')}}">
                          <span class="nav-text">SSC</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tables"
                    aria-expanded="false" aria-controls="tables">
                    <i class="mdi mdi-table"></i>
                    <span class="nav-text">Teachers</span> <b class="caret"></b>
                  </a>
                  <ul class="collapse " id="tables" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('add-teacher')}}">
                          <span class="nav-text">Add Teacher</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('all-teacher')}}">
                          <span class="nav-text">All Teacher</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </aside>