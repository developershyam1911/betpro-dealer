<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Login - Quantum HRM</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <base href="{{ asset('admincss') }}/">
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["{{asset('admincss/assets/css/fonts.min.css')}}"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
</head>

<body class="login bg-danger" style="">
    <div class="wrapper wrapper-login">
        
        <div class="container container-login animated fadeIn p-4">
            <center>
                <img src="{{asset('logo.jpeg')}}" style="height: 70px;">
            </center>
            @if (Session::has('success'))
                <div class="alert alert-sucess">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <h3 class="text-center">Sign In</h3>
            <form action="{{ route('admin.authenticate') }}" method="post">
                @csrf
                <div class="login-form">
                    <div class="form-sub">
                        <div class="form-floating form-floating-custom mb-3">
                            <input id="email" name="email" type="text" class="form-control" placeholder="Email"
                                value="{{ old('email') }}" />
                            <label for="email">Email</label>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-custom mb-3">
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="password" value="{{ old('password') }}" />
                            <label for="password">Password</label>
                            <div class="show-password">
                                {{-- <i class="icon-eye"></i> --}}
                                <i class="fa fa-eye"></i>
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="d-flex form-sub">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberme" />
                                <label class="form-check-label" for="rememberme">Remember Me</label>
                            </div>

                            <a href="#" class="link float-end">Forget Password ?</a>
                        </div>
                    </div>
                    <div class="form-action mb-3">
                        <button type="Submit" class="btn btn-danger w-100 btn-login">Sign In</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- <div class="container container-signup animated fadeIn">
            <h3 class="text-center">Sign Up</h3>
            <div class="login-form">
                <div class="form-sub">
                    <div class="form-floating form-floating-custom mb-3">
                        <input id="fullname" name="fullname" type="text" class="form-control" placeholder="fullname"
                            required />
                        <label for="fullname">Fullname</label>
                    </div>
                    <div class="form-floating form-floating-custom mb-3">
                        <input id="email" name="email" type="email" class="form-control" placeholder="email"
                            required />
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating form-floating-custom mb-3">
                        <input id="passwordsignin" name="passwordsignin" type="password" class="form-control"
                            placeholder="passwordsignin" required />
                        <label for="passwordsignin">Password</label>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                    <div class="form-floating form-floating-custom mb-3">
                        <input id="confirmpassword" name="confirmpassword" type="password" class="form-control"
                            placeholder="confirmpassword" required />
                        <label for="confirmpassword">Confirm Password</label>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="row form-sub m-0">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="agree" id="agree" />
                        <label class="form-check-label" for="agree">I Agree the terms and conditions.</label>
                    </div>
                </div>
                <div class="form-action">
                    <a href="#" id="show-signin" class="btn btn-danger btn-link btn-login me-3">Cancel</a>
                    <a href="#" class="btn btn-primary btn-login">Sign Up</a>
                </div>
            </div>
        </div> --}}
    </div>
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>

    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/kaiadmin.min.js"></script>
    <script src="assets/js/demo.js"></script>
</body>

</html>
