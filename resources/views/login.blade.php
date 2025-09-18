

<html lang="en">

<head>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

<div class="container-fluid">
    <div class="p-5 mb-4 bg-primary text-white">
        <h4 class="text-center fw-bold">USER LOGIN</h4>
    </div>
    
</div>

    <div class="container-fluid mt-5 bg-light py-5">
        <div class="row justify-content-center align-items-center">

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Image Column -->
            <div class="col-xl-6 col-md-6 col-xs-6 text-center mb-4 mb-md-0">
                <img src="{{ asset('assets/login1.png.jpg') }}" alt="logo1" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-xl-6 col-md-6 col-xs-6 text-center mb-4 mb-md-0">
                <div class="container text-bg-light my-sm-5 p-4 rounded-5 text-center"
                    style="width:600px; height:350px;">
                    <h3 class="text-center fw-bold mt-2">USER LOGIN</h3>
                    <div class="m-sm-4">
                        <!-- start form -->
                        <form class="login">
                            <div class="mb-sm-3 text-center row">
                                <label for="inputPassword" class="col-sm-2 fw-bold col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" placeholder="email address" class="email form-control rounded-pill"
                                        name="username">
                                </div>
                            </div>

                            <div class="mb-sm-3 text-center row">
                                <label for="inputPassword" class="col-sm-2 fw-bold col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" placeholder="password" class="password form-control rounded-pill"
                                        name="password">
                                </div>
                            </div>

                            <div class="mb-sm-3 text-center row">
                                <button type="submit" class="loginbtn btn btn-danger rounded-pill fw-bold"
                                    style="width:250px;  margin-left: 140px;">Sign in</button>
                            </div>
                        </form>
                        <p> Don't Have an Account <a href="{{ url('register') }}" class="text-danger text-decoration-none"> Register</p></a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"> </script>
    <script src="{{ asset('assets/js/users/login.js') }}"> </script>
</body>