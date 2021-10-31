<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ url('/') }}">{{ config('app.name') }}</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="{{ url('/home') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                         <!-- teacher -->
                        @if(auth()->user()->usertype == 'teacher')
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-alt"></i>
                                <span>Test Management</span>
                            </a>
                            <ul class="submenu ">
                           
                                 <li class="submenu-item ">
                                    <a href="{{ url('/teacher/alltest') }}">All Test</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/teacher/addtest') }}">Add Test</a>
                                </li>
                            </ul>
                        </li>
                          <!-- student -->
                        @elseif(auth()->user()->usertype == 'student')
                        <li class="sidebar-item ">
                            <a href="{{ url('/student/alltest') }}" class='sidebar-link'>
                                <i class="bi bi-app-indicator"></i>
                                <span>All Test</span>
                            </a>
                       
                        </li>

                      
                        @endif
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
