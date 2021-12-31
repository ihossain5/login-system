<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> Login System | @yield('title')</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />


    @include('admin.layouts.css')


</head>

<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    @if (auth()->user()->email_verified_at == null)
        <h3 class="text-center mt-5">Please verify your email address</h3>
    @endif
    <!-- Begin page -->
    <div id="wrapper">
        @if (auth()->user()->email_verified_at != null)

            @include('admin.layouts.left_sidebar')

        @endif
        <!-- Start right Content here -->
        <div class="content-page">


            <!-- Start content -->
            <div class="content">
                @if (auth()->user()->email_verified_at != null)

                    @include('admin.layouts.top_bar')

                @endif


                @yield('content')

            </div> <!-- content -->
            @include('admin.layouts.footer')
        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->


    @include('admin.layouts.scripts')

</body>

</html>
