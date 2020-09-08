<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}} & {{$title}}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/back/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/back/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/back/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/back/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/back/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="/back/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="/back/assets/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content pb-20">
            @include('back.layouts.include.alert-messages')
                <!-- Advanced login -->
                <form action="{{route('admin.login')}}" method="Post">
                    @csrf
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <h5 class="content-group-lg">{{$title}}</h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="email" name="email" class="form-control" placeholder="E-Poçt">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" name="password" class="form-control" placeholder="Şifrə">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="rememberme" >
                                        Məni Xatırla
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">{{$title}} <i class="icon-arrow-right14 position-right"></i></button>
                        </div>

                        <span class="help-block text-center no-margin">
                            © {{date('Y')}} <a >{{config('app.name')}}. Bütün hüquqlar qorunur.</a>
                        </span>
                    </div>
                </form>
                <!-- /advanced login -->

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
<script>
    setTimeout(function () {
        $('.msj').slideUp(500);
    },5000)
</script>