<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{page_title($title)}}</title>

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

        <!-- Styles -->
        <link href="css/lib/weather-icons.css" rel="stylesheet" />
        <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="css/lib/themify-icons.css" rel="stylesheet">
        <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
        <link href="css/lib/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link href="css/lib/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        
        @include('partials._header')
        <!-- /# sidebar -->
        @include('partials._nav_bar')
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    
                    <!-- /# row -->
                    @yield('content')
                </div>
            </div>
        </div>
        
        <!-- jquery vendor -->
        <!--<script src="js/lib/jquery.min.js"></script>-->
        <!-- new jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- -->

        <!-- -->
        <script src="js/lib/jquery.nanoscroller.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
        <script src="js/ajaxscript.js"></script>
        @yield('script')
        
        <!-- nano scroller -->
        <script src="js/lib/menubar/sidebar.js"></script>
        <script src="js/lib/preloader/pace.min.js"></script>
        <!-- sidebar -->
        <script src="js/lib/bootstrap.min.js"></script>

        <!-- bootstrap -->

        <script src="js/lib/circle-progress/circle-progress.min.js"></script>
        <script src="js/lib/circle-progress/circle-progress-init.js"></script>

       <!-- <script src="js/lib/morris-chart/raphael-min.js"></script>
        <script src="js/lib/morris-chart/morris.js"></script>
        <script src="js/lib/morris-chart/morris-init.js"></script>-->

        <!--  flot-chart js -->
      <!--  <script src="js/lib/flot-chart/jquery.flot.js"></script>
        <script src="js/lib/flot-chart/jquery.flot.resize.js"></script>
        <script src="js/lib/flot-chart/flot-chart-init.js"></script>-->
        <!-- // flot-chart js -->

            <!-- inutile -->

       
        <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
        <!--<script src="js/jquery.tabledit.js"></script>
        <script src="js/tableditscript.js"></script>-->
        <script src="js/scripts.js"></script>
        
        <!-- scripit init-->
        <!-- table edit script -->
        
        <!-- end -->
    </body>
</html>
