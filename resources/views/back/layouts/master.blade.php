@php
    $starttime = microtime(true);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('back.layouts.include.head')
    @yield('head')
</head>

<body>

<!-- Main navbar -->
@include('back.layouts.include.main-navbar')
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include('back.layouts.include.main-sidebar')
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            @yield('page-header')
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                @yield('content')

                <!-- Footer -->
                <div class="footer text-muted">
                    Məxfilik siyasəti © {{date('Y')}} <a >{{config('app.name')}}. Bütün hüquqlar qorunur.</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>

@yield('foot')
<script>
    setTimeout(function () {
        $('.msj').slideUp(500);
    },5000)
</script>

@php
    $endtime = microtime(true);
    dump($endtime - $starttime)
@endphp
