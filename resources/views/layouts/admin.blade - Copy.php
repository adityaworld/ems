<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ url('/') }}/images/favicon.png">

        <title>Admin Panel | {{env('APP_NAME')}}</title>
    
        <!-- Bootstrap 4.0-->
        <link rel="stylesheet" href="{{ url('/') }}/admin/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">        
        <!-- Bootstrap extend-->
        <link rel="stylesheet" href="{{ url('/') }}/admin/cryptocurrency/css/bootstrap-extend.css">
        <!-- Bootstrap 4.0-->
	    <link rel="stylesheet" href="{{ url('/') }}/admin/assets/vendor_components/bootstrap-switch/switch.css">
        <!-- bootstrap wysihtml5 - text editor -->
	    <link rel="stylesheet" href="{{ url('/') }}/admin/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
        <!-- Data Table-->
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/admin/assets/vendor_components/datatable/datatables.min.css"/>
        <!-- gallery -->
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/admin/assets/vendor_components/gallery/css/animated-masonry-gallery.css" />
        <!-- fancybox -->
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/admin/assets/vendor_components/lightbox-master/dist/ekko-lightbox.css" />
        <!-- Popup CSS -->
        <link href="{{ url('/') }}/admin/assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
        <!-- toast CSS -->
        <link href="{{ url('/') }}/admin/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">    
        <!-- daterange picker -->	
        <link rel="stylesheet" href="{{ url('/') }}/admin/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="{{ url('/') }}/admin/assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
        {{-- Dropzone Css --}}
        <link rel="stylesheet" href="{{ url('public/css/dropzone.css') }}">
        <!--alerts CSS -->
        <link href="{{ url('/') }}/admin/assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
        <!--amcharts -->
	    <link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('/') }}/admin/cryptocurrency/css/master_style.css">
        <!-- Fab Admin skins -->
        <link rel="stylesheet" href="{{ url('/') }}/admin/cryptocurrency/css/skins/_all-skins.css">	
        <!-- MyCss -->
        <link rel="stylesheet" href="{{ url('/') }}/admin/cryptocurrency/css/myStyle.css">	
        <style type="text/css" media="screen">
            .ace-editor { 
                min-height: 300px;
            }
        </style>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 3 -->
        <script src="{{ url('/') }}/admin/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>        
        <!-- popper -->
        <script src="{{ url('/') }}/admin/assets/vendor_components/popper/dist/popper.min.js"></script>        
        <!-- Bootstrap 4.0-->
        <script src="{{ url('/') }}/admin/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <style>
            .fixed .content-wrapper, .fixed .right-side {
                padding-top: 60px;
            }
            th {
                white-space: nowrap;
            }
        </style>

        @stack('style')
    </head>
    <body class="hold-transition skin-red sidebar-mini">
        @include('inc.messages')
        <!-- <pre> -->
            <!-- <?php //print_r($activemenu); exit; ?> -->
        <!-- </pre> -->
        <!-- Site wrapper -->
        <div class="wrapper">
        <!-- Top Bar -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{url('/admin/')}}" class="logo">
            <!-- mini logo -->
            <b class="logo-mini">
                <span class="light-logo"><img src="{{ url('/') }}/images/favicon_white.png" alt="logo" style="max-width: 50px"></span>
                <span class="dark-logo"><img src="{{ url('/') }}/images/favicon_dark.png" alt="logo" style="max-width: 50px"></span>
            </b>
            <!-- logo-->
            <span class="logo-lg">
                <img src="{{ url('/') }}/images/logotext_white.png" alt="logo" class="light-logo" style="max-width: 130px">
                <img src="{{ url('/') }}/images/logotext_dark.png" alt="logo" class="dark-logo" style="max-width: 130px">
            </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                </a>		  
            </div>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->profile_image != NULL)
                            <img src="{{ url('/') }}/uploads/{{Auth::user()->profile_image}}" alt="user" class="user-image rounded-circle">
                        @else
                            <img src="{{ url('/') }}/admin/images/user.png" alt="user" class="user-image rounded-circle">
                        @endif
                    </a>
                    <ul class="dropdown-menu scale-up">
                    <!-- User image -->
                    <li class="user-header">
                        @if(Auth::user()->profile_image != NULL)
                            <img src="{{ url('/') }}/uploads/{{Auth::user()->profile_image}}" alt="user" class="float-left rounded-circle">
                        @else
                            <img src="{{ url('/') }}/admin/images/user.png" alt="user" class="float-left rounded-circle">
                        @endif
                        <p>
                            {{Auth::user()->name}}
                            <small class="mb-5">{{Auth::user()->email}}</small>
                            <a href="{{url('/')}}" target="_blank" class="btn btn-danger btn-sm btn-rounded">View Website</a>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <div class="row no-gutters">
                            <div class="col-12 text-left">
                                <a href="{{URL::to('admin/edit/profile')}}"><i class="ion ion-edit"></i> Edit Profile</a>
                            </div>
                            <div role="separator" class="divider col-12"></div>

                            
                            <div class="col-12 text-left">
                                <a href="{{URL::to('admin/logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                            </div>	
                            <div role="separator" class="divider col-12"></div>
                        </div>
                        <!-- /.row -->
                    </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a> -->
                </li>
                </ul>
            </div>
            </nav>
        </header>
        
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">    
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="user-profile treeview">
                        <a href="javascript:;">
                            @if(Auth::user()->profile_image != NULL)
                                <img src="{{ url('/') }}/uploads/{{Auth::user()->profile_image}}" alt="user">
                            @else
                                <img src="{{ url('/') }}/admin/images/user.png" alt="user">
                            @endif
                            <span>Hi, {{Auth::user()->name}}</span>
                        </a>
                    </li>

                    <li class="header nav-small-cap">CONTROL PANEL</li>

                    <li class="{{ ( isset($activemenu['main']) && $activemenu['main'] == 'dashboard' ) ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    </li>

                    <li class="{{ ( isset($activemenu['main']) && $activemenu['main'] == 'appslider' ) ? 'active' : '' }}">
                        <a href="{{ url('/admin/app-slider') }}">
                            <i class="fa fa-image"></i> <span>App Slider</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'currentaffairsquiz' ) ? 'active' : '' }}">
                        <a href="#">
                            <i style="top: 25px; position: absolute;" class="fa fa-clock-o"></i>
                            <span style="padding-left: 43px">Current Affairs</span><br>
                            <span style="padding-left: 43px">Quiz</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'currentaffairsquiz' && $activemenu['sub'] == 'modules' ) ? 'active' : '' }}"><a href="{{url('/admin/current-affairs-quiz/modules')}}"><i class="fa fa-circle-thin"></i>Modules</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'currentaffairsquiz' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/current-affairs-quiz/categories')}}"><i class="fa fa-circle-thin"></i>Categories</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'dailyquiz' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-calendar"></i> <span>Daily Quiz</span>
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'dailyquiz' && $activemenu['sub'] == 'modules' ) ? 'active' : '' }}"><a href="{{url('/admin/daily-quiz/modules')}}"><i class="fa fa-circle-thin"></i>Modules</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'dailyquiz' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/daily-quiz/categories')}}"><i class="fa fa-circle-thin"></i>Categories</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'exambooster' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-rocket"></i>
                            <span>Exam Booster</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'exambooster' && $activemenu['sub'] == 'modules' ) ? 'active' : '' }}"><a href="{{url('/admin/exam-booster/modules')}}"><i class="fa fa-circle-thin"></i>Modules</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'exambooster' && $activemenu['sub'] == 'articles' ) ? 'active' : '' }}"><a href="{{url('/admin/exam-booster/articles')}}"><i class="fa fa-circle-thin"></i>Articles</a></li>
                            {{-- <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'exambooster' && $activemenu['sub'] == 'pdf' ) ? 'active' : '' }}"><a href="{{url('/admin/exam-booster/pdf')}}"><i class="fa fa-circle-thin"></i>PDF</a></li> --}}
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'exambooster' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/exam-booster/categories')}}"><i class="fa fa-circle-thin"></i>Category (Level 1)</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'exambooster' && $activemenu['sub'] == 'categories-2' ) ? 'active' : '' }}"><a href="{{url('/admin/exam-booster/categories/level-2')}}"><i class="fa fa-circle-thin"></i>Category (Level 2)</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'examstrategy' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-bullseye"></i>
                            <span>Exam Strategy</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'examstrategy' && $activemenu['sub'] == 'articles' ) ? 'active' : '' }}"><a href="{{url('/admin/exam-strategy/articles')}}"><i class="fa fa-circle-thin"></i>Articles</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'examstrategy' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/exam-strategy/categories')}}"><i class="fa fa-circle-thin"></i>Category</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'forum' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-lightbulb-o"></i>
                            <span>Forum</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'forum' && $activemenu['sub'] == 'view' ) ? 'active' : '' }}"><a href="{{url('/admin/forum/view')}}"><i class="fa fa-circle-thin"></i>View</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'forum' && $activemenu['sub'] == 'add' ) ? 'active' : '' }}"><a href="{{url('/admin/forum/add')}}"><i class="fa fa-circle-thin"></i>Add</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'gk' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-glide-g"></i>
                            <span>GK</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'gk' && $activemenu['sub'] == 'modules' ) ? 'active' : '' }}"><a href="{{url('/admin/gk/modules')}}"><i class="fa fa-circle-thin"></i>Modules</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'gk' && $activemenu['sub'] == 'articles' ) ? 'active' : '' }}"><a href="{{url('/admin/gk/articles')}}"><i class="fa fa-circle-thin"></i>Articles</a></li>
                            {{-- <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'gk' && $activemenu['sub'] == 'pdf' ) ? 'active' : '' }}"><a href="{{url('/admin/gk/pdf')}}"><i class="fa fa-circle-thin"></i>PDF</a></li> --}}
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'gk' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/gk/categories')}}"><i class="fa fa-circle-thin"></i>Category (Level 1)</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'gk' && $activemenu['sub'] == 'categories-2' ) ? 'active' : '' }}"><a href="{{url('/admin/gk/categories/level-2')}}"><i class="fa fa-circle-thin"></i>Category (Level 2)</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'aboutexam' ) ? 'active' : '' }}">
                        <a href="#">
                            <i style="top: 25px; position: absolute;" class="fa fa-question-circle"></i>
                            <span style="padding-left: 43px">Latest Exam</span><br>
                            <span style="padding-left: 43px">Updates</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">                            
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'aboutexam' && $activemenu['sub'] == 'articles' ) ? 'active' : '' }}"><a href="{{url('/admin/about-exam/articles')}}"><i class="fa fa-circle-thin"></i>Articles</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'aboutexam' && $activemenu['sub'] == 'categories-1' ) ? 'active' : '' }}"><a href="{{url('/admin/about-exam/categories/level-1')}}"><i class="fa fa-circle-thin"></i>Category (Level 1)</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'aboutexam' && $activemenu['sub'] == 'categories-2' ) ? 'active' : '' }}"><a href="{{url('/admin/about-exam/categories/level-2')}}"><i class="fa fa-circle-thin"></i>Category (Level 2)</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'livetest' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-television"></i>
                            <span>Live Test</span><br>                            
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'livetest' && $activemenu['sub'] == 'modules' ) ? 'active' : '' }}"><a href="{{url('/admin/live-test/modules-package')}}"><i class="fa fa-circle-thin"></i>Modules Package</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'livetest' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/live-test/categories')}}"><i class="fa fa-circle-thin"></i>Categories</a></li>
                        </ul>
                    </li>

                    <li class="{{ ( isset($activemenu['main']) && $activemenu['main'] == 'media' ) ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-picture-o"></i> <span>Medias</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'ncert' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-flag"></i>
                            <span>NCERT</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'ncert' && $activemenu['sub'] == 'modules' ) ? 'active' : '' }}"><a href="{{url('/admin/ncert/modules')}}"><i class="fa fa-circle-thin"></i>Modules</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'ncert' && $activemenu['sub'] == 'articles' ) ? 'active' : '' }}"><a href="{{url('/admin/ncert/articles')}}"><i class="fa fa-circle-thin"></i>Articles</a></li>
                            {{-- <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'ncert' && $activemenu['sub'] == 'pdf' ) ? 'active' : '' }}"><a href="{{url('/admin/ncert/pdf')}}"><i class="fa fa-circle-thin"></i>PDF</a></li> --}}
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'ncert' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/ncert/categories')}}"><i class="fa fa-circle-thin"></i>Category (Level 1)</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'ncert' && $activemenu['sub'] == 'categories-2' ) ? 'active' : '' }}"><a href="{{url('/admin/ncert/categories/level-2')}}"><i class="fa fa-circle-thin"></i>Category (Level 2)</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'pdfsections' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-file-pdf-o"></i>
                            <span>PDF Section</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'pdfsections' && $activemenu['sub'] == 'view' ) ? 'active' : '' }}"><a href="{{url('/admin/pdf-sections/view')}}"><i class="fa fa-circle-thin"></i>View</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'pdfsections' && $activemenu['sub'] == 'add' ) ? 'active' : '' }}"><a href="{{url('/admin/pdf-sections/add')}}"><i class="fa fa-circle-thin"></i>Add</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'pdfsections' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/pdf-sections/categories')}}"><i class="fa fa-circle-thin"></i>Categories</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'mocktest' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-tasks"></i>
                            <span>Popular Test</span><br>                            
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'mocktest' && $activemenu['sub'] == 'modules' ) ? 'active' : '' }}"><a href="{{url('/admin/mock-test/modules-package')}}"><i class="fa fa-circle-thin"></i>Modules Package</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'mocktest' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/mock-test/categories')}}"><i class="fa fa-circle-thin"></i>Categories (Level-1)</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'mocktest' && $activemenu['sub'] == 'categories-2' ) ? 'active' : '' }}"><a href="{{url('/admin/mock-test/categories/level-2')}}"><i class="fa fa-circle-thin"></i>Categories (Level-2)</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'previousyearquestions' ) ? 'active' : '' }}">
                        <a href="#">
                            <i style="top: 25px; position: absolute;" class="fa fa-question-circle"></i>
                            <span style="padding-left: 43px">Previous Year</span><br>
                            <span style="padding-left: 43px">Questions</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'previousyearquestions' && $activemenu['sub'] == 'view' ) ? 'active' : '' }}"><a href="{{url('/admin/previous-year-questions/view')}}"><i class="fa fa-circle-thin"></i>View</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'previousyearquestions' && $activemenu['sub'] == 'add' ) ? 'active' : '' }}"><a href="{{url('/admin/previous-year-questions/add')}}"><i class="fa fa-circle-thin"></i>Add</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'previousyearquestions' && $activemenu['sub'] == 'categories-1' ) ? 'active' : '' }}"><a href="{{url('/admin/previous-year-questions/categories/level-1')}}"><i class="fa fa-circle-thin"></i>Categories (Level 1)</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'previousyearquestions' && $activemenu['sub'] == 'categories-2' ) ? 'active' : '' }}"><a href="{{url('/admin/previous-year-questions/categories/level-2')}}"><i class="fa fa-circle-thin"></i>Categories (Level 2)</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'previousyearquestions' && $activemenu['sub'] == 'categories-3' ) ? 'active' : '' }}"><a href="{{url('/admin/previous-year-questions/categories/level-3')}}"><i class="fa fa-circle-thin"></i>Categories (Level 3)</a></li>
                        </ul>
                    </li>

                    <li class="{{ ( isset($activemenu['main']) && $activemenu['main'] == 'pushnotification' ) ? 'active' : '' }}">
                        <a href="{{ url('/admin/push-notification') }}">
                            <i class="fa fa-bell"></i> <span>Push Notification</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    </li>

                    <li class="{{ ( isset($activemenu['main']) && $activemenu['main'] == 'referral' ) ? 'active' : '' }}">
                        <a href="{{ url('/admin/referral/management') }}">
                            <i class="fa fa-share"></i> <span>Referral Mngmnt</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'stategk' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-flag"></i>
                            <span>State GK</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'stategk' && $activemenu['sub'] == 'modules' ) ? 'active' : '' }}"><a href="{{url('/admin/state-gk/modules')}}"><i class="fa fa-circle-thin"></i>Modules</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'stategk' && $activemenu['sub'] == 'articles' ) ? 'active' : '' }}"><a href="{{url('/admin/state-gk/articles')}}"><i class="fa fa-circle-thin"></i>Articles</a></li>
                            {{-- <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'stategk' && $activemenu['sub'] == 'pdf' ) ? 'active' : '' }}"><a href="{{url('/admin/state-gk/pdf')}}"><i class="fa fa-circle-thin"></i>PDF</a></li> --}}
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'stategk' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/state-gk/categories')}}"><i class="fa fa-circle-thin"></i>Category (Level 1)</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'stategk' && $activemenu['sub'] == 'categories-2' ) ? 'active' : '' }}"><a href="{{url('/admin/state-gk/categories/level-2')}}"><i class="fa fa-circle-thin"></i>Category (Level 2)</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'subjectwisequiz' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-question-circle"></i> <span>Subjectwise Quiz</span>
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'subjectwisequiz' && $activemenu['sub'] == 'modules' ) ? 'active' : '' }}"><a href="{{url('/admin/subjectwise-quiz/modules')}}"><i class="fa fa-circle-thin"></i>Modules</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'subjectwisequiz' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/subjectwise-quiz/categories')}}"><i class="fa fa-circle-thin"></i>Categories</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'successstory' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-history"></i>
                            <span>Success Stories</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'successstory' && $activemenu['sub'] == 'articles' ) ? 'active' : '' }}"><a href="{{url('/admin/success-story/articles')}}"><i class="fa fa-circle-thin"></i>Articles</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'successstory' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/success-story/categories')}}"><i class="fa fa-circle-thin"></i>Category</a></li>
                        </ul>
                    </li>

                    <li class="{{ ( isset($activemenu['main']) && $activemenu['main'] == 'userfeedbacks' ) ? 'active' : '' }}">
                        <a href="{{ url('/admin/user-feedbacks') }}">
                            <i class="fa fa-comments-o"></i> <span>User Feedbacks</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    </li>

                    <li class="{{ ( isset($activemenu['main']) && $activemenu['main'] == 'users' ) ? 'active' : '' }}">
                        <a href="{{ url('/admin/users/view') }}">
                            <i class="fa fa-users"></i> <span>Users</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    </li>

                    <li class="treeview {{ ( isset($activemenu['main']) && $activemenu['main'] == 'youtubevideos' ) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-youtube"></i>
                            <span>YouTube Videos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'youtubevideos' && $activemenu['sub'] == 'view' ) ? 'active' : '' }}"><a href="{{url('/admin/youtube-videos/view')}}"><i class="fa fa-circle-thin"></i>View</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'youtubevideos' && $activemenu['sub'] == 'add' ) ? 'active' : '' }}"><a href="{{url('/admin/youtube-videos/add')}}"><i class="fa fa-circle-thin"></i>Add</a></li>
                            <li class="{{ ( isset($activemenu['sub']) && $activemenu['main'] == 'youtubevideos' && $activemenu['sub'] == 'categories' ) ? 'active' : '' }}"><a href="{{url('/admin/youtube-videos/categories')}}"><i class="fa fa-circle-thin"></i>Categories</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        
        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('admin/logout')}}">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}" target="_blank">View Website</a>
                </li>
                </ul>
            </div>
            @<a href="http://examstoday.in/" target="_blank">Exams Today</a>
        </footer>
        
        <!-- ----Right Sidebar---- -->
        
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div></div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <!-- <script src="{{ url('/') }}/admin/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>         -->
        <!-- popper -->
        {{-- <script src="{{ url('/') }}/admin/assets/vendor_components/popper/dist/popper.min.js"></script>         --}}
        <!-- Bootstrap 4.0-->
        {{-- <script src="{{ url('/') }}/admin/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>         --}}
        <!-- SlimScroll -->
        <script src="{{ url('/') }}/admin/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>        
        <!-- FastClick -->
        <script src="{{ url('/') }}/admin/assets/vendor_components/fastclick/lib/fastclick.js"></script>        
        <!-- Fab Admin App -->
        <script src="{{ url('/') }}/admin/cryptocurrency/js/template.js"></script>        
        <!-- Fab Admin for demo purposes -->
        <script src="{{ url('/') }}/admin/cryptocurrency/js/demo.js"></script>
        <!-- CK Editor -->
        <script src="{{ url('/') }}/admin/assets/vendor_components/ckeditor/ckeditor.js"></script>        
        <!-- Form validator JavaScript -->
        <script src="{{ url('/') }}/admin/cryptocurrency/js/pages/validation.js"></script>
        <!-- Magnific popup JavaScript -->
        <script src="{{ url('/') }}/admin/assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
        <script src="{{ url('/') }}/admin/assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
        <script>
            !function(window, document, $) {
                "use strict";
                    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            }(window, document, jQuery);
        </script>   
        <!--amcharts charts -->
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ url('/') }}/admin/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>        
        <!-- Fab Admin for editor -->
        <script src="{{ url('/') }}/admin/cryptocurrency/js/pages/editor.js"></script>
        <!-- This is data table -->
        <script src="{{ url('/') }}/admin/assets/vendor_components/datatable/datatables.min.js"></script>        
        <!-- Fab Admin for Data Table -->
        <script src="{{ url('/') }}/admin/cryptocurrency/js/pages/data-table.js"></script>
        <!-- gallery -->
        <script type="text/javascript" src="{{ url('/') }}/admin/assets/vendor_components/gallery/js/animated-masonry-gallery.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/admin/assets/vendor_components/gallery/js/jquery.isotope.min.js"></script>    
        <!-- date-range-picker -->
        <script src="{{ url('/') }}/admin/assets/vendor_components/moment/min/moment.min.js"></script>
        <script src="{{ url('/') }}/admin/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap time picker -->
        <script src="{{ url('/') }}/admin/assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- Fab Admin for advanced form element -->
	    <script src="{{ url('/') }}/admin/cryptocurrency/js/pages/advanced-form-element.js"></script>
        <!-- fancybox -->
        <script type="text/javascript" src="{{ url('/') }}/admin/assets/vendor_components/lightbox-master/dist/ekko-lightbox.js"></script>        
        <script type="text/javascript">
            $(document).ready(function($) {
                // delegate calls to data-toggle="lightbox"
                $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
                    event.preventDefault();
                    return $(this).ekkoLightbox({
                        onShown: function() {
                            if (window.console) {
                                return console.log('Checking our the events huh?');
                            }
                        },
                        onNavigate: function(direction, itemIndex) {
                            if (window.console) {
                                return console.log('Navigating ' + direction + '. Current item: ' + itemIndex);
                            }
                        }
                    });
                });
                //Programatically call
                $('#open-image').click(function(e) {
                    e.preventDefault();
                    $(this).ekkoLightbox();
                });
                $('#open-youtube').click(function(e) {
                    e.preventDefault();
                    $(this).ekkoLightbox();
                });
                // navigateTo
                $(document).delegate('*[data-gallery="navigateTo"]', 'click', function(event) {
                    event.preventDefault();
                    var lb;
                    return $(this).ekkoLightbox({
                        onShown: function() {
                            lb = this;
                            $(lb.modal_content).on('click', '.modal-footer a', function(e) {
                                e.preventDefault();
                                lb.navigateTo(2);
                            });
                        }
                    });
                });
            });
        </script>
        <!-- toast -->
	    <script src="{{ url('/') }}/admin/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
        <script src="{{ url('/') }}/admin/cryptocurrency/js/pages/toastr.js"></script>        
        <!-- ace-editor -->	
        <script src="{{ url('/') }}/admin/assets/vendor_plugins/ace-builds-master/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
        <script>
            var editor = ace.edit("editorJS");
            editor.setTheme("ace/theme/solarized_light");
            editor.getSession().setMode("ace/mode/javascript");

            // var editor = ace.edit("editorHTML");
            // editor.setTheme("ace/theme/solarized_light");
            // editor.getSession().setMode("ace/mode/html");

            var editor = ace.edit("editorCSS");
            editor.setTheme("ace/theme/solarized_light");
            editor.getSession().setMode("ace/mode/css");
        </script>
        {{-- Dropzone JS --}}
        <script src="{{ url('public/js/dropzone.js') }}"></script>
        <!-- Sweet-Alert  -->
        <script src="{{ url('/') }}/admin/assets/vendor_components/sweetalert/sweetalert.min.js"></script>

        @stack('script')

        <script>
            $( document ).ready(function() {
                $('input[type="number"]').attr('step', 'any');
            });
        </script>
    </body>
</html>
