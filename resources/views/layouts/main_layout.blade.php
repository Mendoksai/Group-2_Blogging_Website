<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Milane Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/img/favicon.ico') }}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/normalize.css') }}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/main.css') }}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/educate-custon-icon.css') }}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('theme/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('theme/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    @include('body.sidebar')
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="{{ asset('theme/uploads/psu_logo.png') }}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">

            @include('body.header')


            <!-- Mobile Menu start -->
            @include('body.mobile_header')
            <!-- Mobile Menu end -->

            <!--breadcrumb-->
            @auth
              @if(auth()->user()->account_role == 'Admin')
              <div class="breadcome-area " style="margin-top: 30px">
                  <div class="container-fluid">
                      <div class="row ">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="breadcome-list single-page-breadcome">
                                  <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                          <div class="breadcome-heading">
                                            
                                            @include('body.search')
                                              
                                          </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                          <ul class="breadcome-menu">
                                              <li><a href="/">Home</a> <span class="bread-slash">/</span>
                                              </li>
                                              {{-- 
                                              <li><span class="bread-blod">Widgets</span>
                                              </li>
                                              --}}
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endif
            @endauth

            <!--end of breadcrumb-->


        </div>


        @yield('content')


        @include('body.footer')

    </div>

    <!-- jquery
		============================================ -->
    <script src="{{ asset('theme/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('theme/js/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('theme/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('theme/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('theme/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('theme/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('theme/js/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('theme/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('theme/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('theme/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('theme/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{ asset('theme/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('theme/js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{ asset('theme/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('theme/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('theme/js/calendar/fullcalendar-active.js') }}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{ asset('theme/js/tab.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('theme/js/plugins.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('theme/js/main.js') }}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{ asset('theme/js/tawk-chat.js') }}"></script>

</body>

</html>