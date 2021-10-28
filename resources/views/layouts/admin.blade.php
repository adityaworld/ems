<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | @if(isset($title)) {{ $title}} @endif</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/admin/css/bootstrap.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin/css/app.css">
     <link rel="stylesheet" href="{{ url('/') }}/admin/vendors/choices.js/choices.min.css" />
    <link rel="shortcut icon" href="{{ url('/') }}/admin/images/favicon.svg" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
    <div id="app">
        <!-- //sideber -->
        @include('layouts.sideber')
        <!-- //sideber end -->
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown me-1">
                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header">Mail</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">No new mail</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item">No notification available</a></li>
                        </ul>
                    </li>
                </ul>

<script>
  @if(Session::has('success'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('success') }}");
  @endif

    @if(Session::has('msg'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('msg') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.error("{{ session('error') }}");
  @endif
 @if(Session::has('err'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.error("{{ session('err') }}");
  @endif
  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.warning("{{ session('warning') }}");
  @endif
</script>




                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600 text-capitalize"> 
                                    @if(isset(Auth::user()->name))
                                    {{ Auth::user()->name }}</h6>
                                    @endif
                                    <p class="mb-0 text-sm text-gray-600">
                                       @if(Auth::user() && Auth::user()->usertype_id == 1)
                                       {{ __('Hello Admin!') }}
                                       @endif
                                   </p>                         </div>
                                   <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        @if(Auth::user()->photo)
                                        <img src="{{ url('/profile/') }}/{{Auth::user()->photo}}" >
                                        @else
                                        <img src="{{ url('/') }}/admin/images/faces/1.jpg">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Hello,   @if(isset(Auth::user()->name)){{ Auth::user()->name }}! @endif</h6>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                            Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                            Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                            Wallet</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item"  href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i
                             class="icon-mid bi bi-box-arrow-left me-2"></i>{{ __('Logout') }}</a></li>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                              <!--   <h3>Vertical Layout with Navbar</h3>
                                <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                                    <!--     <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar
                                    </li> -->
                                    <?php $segments = url('/'); ?>
                                    @foreach(Request::segments() as $segment)
                                    <?php $segments .= '/'.$segment; ?>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{ $segments }}">{{$segment}}</a>
                                    </li>
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                 @yield('content')
             </section>
         </div>

         <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>{{ date('Y')}} &copy; {{config('app.name')}}</p>
                </div>
                <div class="float-end">
                  
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
<script src="{{ url('/') }}/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ url('/') }}/admin/js/bootstrap.bundle.min.js"></script>

<script src="{{ url('/') }}/admin/js/main.js"></script>
</body>

</html>
