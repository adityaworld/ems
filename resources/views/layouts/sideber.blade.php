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
                         <!-- admin -->
                        @if(auth()->user()->usertype_id == 1)
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Users</span>
                            </a>
                            <ul class="submenu ">
                            <!--     <li class="submenu-item ">
                                    <a href="{{ url('/admin/add/superteacher/create') }}">Add Super Teacher</a>
                                </li>
                                 <li class="submenu-item ">
                                    <a href="{{ url('/admin/add/masterteacher/create') }}">Add Master Teacher</a>
                                </li> -->
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/add/teacher/create') }}">Add Teacher</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/add/superassociate/create') }}">Add Super Associate</a>
                                </li>
                                 <li class="submenu-item ">
                                    <a href="{{ url('/admin/add/masterassociate/create') }}">Add Master Associate</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/add/associate/create') }}">Add Associate</a>
                                </li>
                              <!--   <li class="submenu-item ">
                                    <a href="{{ url('/admin/user/superteacher') }}">All Super Teacher</a>
                                </li>
                                 <li class="submenu-item ">
                                    <a href="{{ url('/admin/user/masterteacher') }}">All Master Teacher</a>
                                </li> -->
                                 <li class="submenu-item ">
                                    <a href="{{ url('/admin/user/teacher') }}">All Teacher</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/user/superassociate') }}">All Super Associate</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/user/masterassociate') }}">All Master Associate</a>
                                </li>
                                 <li class="submenu-item ">
                                    <a href="{{ url('/admin/user/associate') }}">All Associate</a>
                                </li>
                                 <li class="submenu-item ">
                                    <a href="{{ url('/admin/user/student') }}">All Student</a>
                                </li>
                                

                            </ul>
                        </li>
                        
                        <li class="sidebar-item  ">
                            <a href="{{ route('allwithdrawlrequest') }}" class='sidebar-link'>
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                <span>Withdrawl Request</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item  ">
                            <a href="{{ route('associate.commision') }}" class='sidebar-link'>
                            <i class="fa fa-percent"></i>
                                <span>Associate Commission</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-gift"></i>
                                <span>Gift & Point Management</span>
                            </a>
                            <ul class="submenu ">
                            <li class="submenu-item ">
                                    <a href="{{ route('associate.addgift') }}">Add Associate Gift</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('associate.giftlist') }}">All Associate Gift</a>
                                </li>
                            <li class="submenu-item ">
                                    <a href="{{ route('redemption.addpointgift') }}">Add Point Redemption Plan</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('redemption.allpointlist') }}">All Point Redemption Plan</a>
                                </li>
                              
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-card-list"></i>
                                <span>Exam Management</span>
                            </a>
                            <ul class="submenu ">
                                  <li class="submenu-item ">
                                    <a href="{{ url('/admin/test/allexam') }}">All Exam</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/test/createexam') }}">Create Exam</a>
                                </li>
                              
                            </ul>
                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-app-indicator"></i>
                                <span>Data Management</span>
                            </a>
                            <ul class="submenu ">
                                  <li class="submenu-item ">
                                    <a href="{{ url('/admin/showclass') }}">Show Class</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/addclass') }}">Add Class</a>
                                </li>
                              


                                 <li class="submenu-item ">
                                    <a href="{{ url('/admin/showsubject') }}">Show Subject</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/addsubject') }}">Add Subject</a>
                                </li>

                            </ul>

                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-shield-fill-check" style="color: green;"></i>
                                <span>Subscription Management</span>
                            </a>
                            <ul class="submenu ">
                                  <li class="submenu-item ">
                                    <a href="{{ url('/admin/activesubscription') }}">Active Subscribed Students</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/subscriptionhistory') }}">Subscription History.</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/managesubscription') }}">Subscription Settings</a>
                                </li>

                            </ul>

                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-skip-end-btn-fill"  style="color: tomato;"></i>
                                <span>Video Management</span>
                            </a>
                            <ul class="submenu ">
                                  <li class="submenu-item ">
                                    <a href="{{ url('/admin/addvideo') }}">Add Video</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/allvideo') }}">All Video</a>
                                </li>
                            </ul>

                        </li>

                                                <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-shop" ></i>
                                <span>Shop Management</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/shop/products/admin') }}">Physical product</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/allvideo') }}">Digital products</a>
                                </li>
                                  <li class="submenu-item ">
                                    <a href="{{ url('/admin/shop/categories') }}">Categories</a>
                                </li>
                                
                            </ul>

                        </li>
               <!--          <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>School</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/add/school/create') }}">Add School</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('/admin/user/school') }}">All Teachers</a>
                                </li>
                            </ul>
                        </li> -->
                          <!-- school -->
                        @elseif(auth()->user()->usertype_id == 2)

                                                  <!-- teacher -->
                            

                      
                        @endif
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
