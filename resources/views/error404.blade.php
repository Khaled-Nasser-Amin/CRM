<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Error 404 | Zircos - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body class="authentication-bg">
<div class="home-btn d-none d-sm-block">
    <a href="index.html"><i class="fas fa-home h2"></i></a>
</div>
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 text-center">

                <div class="wrapper-page">
                    <img src="{{asset('images/animat-search-color.gif')}}" alt="" height="120">
                    <h2 class="text-uppercase text-danger">Page Not Found</h2>
                    <p class="text-muted mb-2">It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us. You might want to check your internet connection. Here's a little tip that might help you get back on track.</p>
                    <a class="btn btn-success waves-effect waves-light mt-4" href="{{route('dashboard')}}"> Return Home</a>
                </div>
            </div>

        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->

<!-- Vendor js -->
<script src="{{asset('js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('js/app.min.js')}}"></script>

</body>

</html>
