<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:35:16 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('build/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('build/assets/images/favicon.png') }}" type="image/x-icon">
    <title>
        @section('title')
            Food |
        @show
    </title>

    <!-- Google font-->
    <link
        href="{{ asset('build/assets/css/style.css') }}"
        rel="stylesheet">
        <link rel="icon" href="{{ asset('build/assets/images/favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('build/assets/images/favicon.png') }}" type="image/x-icon">
        
        <!-- Linear Icon css -->
        <link rel="stylesheet" href="{{ asset('build/assets/css/linearicon.css') }}">
        
        <!-- fontawesome css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/vendors/font-awesome.css') }}">
        
        <!-- Themify icon css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/vendors/themify.css') }}">
        
        <!-- ratio css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/ratio.css') }}">
        
        <!-- remixicon css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/remixicon.css') }}">
        
        <!-- Feather icon css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/vendors/feather-icon.css') }}">
        
        <!-- Plugins css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/vendors/scrollbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/vendors/animate.css') }}">
        
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/vendors/bootstrap.css') }}">
        
        <!-- vector map css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/vector-map.css') }}">
        
        <!-- Slick Slider Css -->
        <link rel="stylesheet" href="{{ asset('build/assets/css/vendors/slick.css') }}">
        
        <!-- App css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/style.css') }}">
</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        @include('admin.layouts.partials.nav')

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            @include('admin.layouts.partials.sidebar')

            <!-- index body start -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <!-- footer start-->
                @include('admin.layouts.partials.footer')
                <!-- footer End-->
            </div>
            <!-- index body end -->

        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End-->



    <!-- latest js -->
<script src="{{ asset('build/assets/js/jquery-3.6.0.min.js') }}"></script>

<!-- Bootstrap js -->
<script src="{{ asset('build/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- feather icon js -->
<script src="{{ asset('build/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('build/assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- scrollbar simplebar js -->
<script src="{{ asset('build/assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('build/assets/js/scrollbar/custom.js') }}"></script>

<!-- Sidebar jquery -->
<script src="{{ asset('build/assets/js/config.js') }}"></script>

<!-- tooltip init js -->
<script src="{{ asset('build/assets/js/tooltip-init.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('build/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('build/assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('build/assets/js/notify/index.js') }}"></script>

<!-- Apexchart js -->
<script src="{{ asset('build/assets/js/chart/apex-chart/apex-chart1.js') }}"></script>
<script src="{{ asset('build/assets/js/chart/apex-chart/moment.min.js') }}"></script>
<script src="{{ asset('build/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('build/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('build/assets/js/chart/apex-chart/chart-custom1.js') }}"></script>

<!-- slick slider js -->
<script src="{{ asset('build/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('build/assets/js/custom-slick.js') }}"></script>

<!-- customizer js -->
<script src="{{ asset('build/assets/js/customizer.js') }}"></script>

<!-- ratio js -->
<script src="{{ asset('build/assets/js/ratio.js') }}"></script>

<!-- sidebar effect -->
<script src="{{ asset('build/assets/js/sidebareffect.js') }}"></script>

<!-- Theme js -->
<script src="{{ asset('build/assets/js/script.js') }}"></script>

@stack('scripts')
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:35:33 GMT -->

</html>
