<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<script src="{{asset('/js/pages/layout.js')}}"></script>

<!-- Bootstrap Css -->
<link href="{{asset('admin/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- simplebar css -->
<link href="{{asset('admin/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">
<!-- App Css-->
<link href="{{asset('admin/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/css/custom.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<!-- Toastr CSS -->

</head>
<body>
    
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
    @yield('content')
    @include('admin.includes.footer')
</body>

<script src="{{asset('admin/js/pages/dashboard.init.js')}}"></script>
<script src="{{asset('admin/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/js/pages/apexcharts-area.init.js')}}"></script>
<!-- apexcharts -->
<script src="{{asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{asset('admin/js/pages/dashboard.init.js')}}"></script>

<!-- App js -->
<script src="{{asset('admin/js/app.js')}}"></script>

<!-- Toastr JS -->
@stack('scripts')

</html>