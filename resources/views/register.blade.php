<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Register Page</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">

</head>


<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">


                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Free Register</h4>
                    <p class="text-muted text-center">Get your free account now.</p>

                    {{-- @if ($errors->any())
                        <div class=" mt-3">
                            <div class="font-medium text-red-600 text-danger">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-danger text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center text-dark mt-3 alert-solid alert-dismissible shadow-sm p-3 mb-5 rounded"
                            role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-success text-center text-dark mt-3 alert-solid alert-dismissible shadow-sm p-3 mb-5 rounded"
                            role="alert">
                            {{ session('error   ') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <form class="form-horizontal m-t-30 loginForm" action="{{ route('sign.up') }}" method="POST">@csrf

                        <div class="form-group">
                            <label for="username">Full Name</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="Enter full name">
                        </div>
                        @error('full_name')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="Enter email">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}"
                                placeholder="Enter date of birth">
                            @error('date_of_birth')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="user_name" class="form-control" placeholder="Enter username" value="{{ old('user_name') }}">
                            @error('user_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}"
                                placeholder="Enter password">
                            @error('password')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="confirm password">
                            @error('password_confirmation')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row m-t-20">

                            <div class="col-sm-6 ">
                                <button class="btn btn-primary btn-block w-md waves-effect waves-light"
                                    type="submit">Register
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p>Already have an account ? <a href="{{ route('login') }}"
                    class="font-500 font-14 text-primary font-secondary"> Login </a> </p>

        </div>

    </div>


    <!-- jQuery  -->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>


    <!-- App js -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $(".loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    full_name: {
                        required: true,
                    },
                    user_name: {
                        required: true,
                    },
                    date_of_birth: {
                        required: true,
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    }
                },
                messages: {
                    email: {
                        required: 'Plese enter your email',
                        email: 'Email must be a valid email address',
                    },
                    password: {
                        required: 'Plese enter your password',
                    },
                    full_name: {
                        required: 'Plese enter your full name',
                    },
                    user_name: {
                        required: 'Plese enter your name',
                    },
                    date_of_birth: {
                        required: 'Plese enter date of birth',
                    },
                }
            });
        });
    </script>

</body>

</html>
