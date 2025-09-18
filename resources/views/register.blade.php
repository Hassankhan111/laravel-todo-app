

<html lang="en">

<head>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<div class="container-fluid">
    <div class="p-5 mb-4 bg-primary text-white">
        <h4 class="text-center fw-bold">REGISTRATION FORM</h4>
    </div>
    
</div>

<div class="container-fluid mt-5 bg-light py-5">
    <div class="row justify-content-center align-items-center">

        <!-- Image Column -->
        <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
            <img src="{{ asset('assets/login1.png.jpg') }}" alt="logo1" class="img-fluid rounded shadow-sm">
        </div>

        <!-- Form Column -->
        <div class="col-12 col-md-6">
            <form class="register">
                 <input type="hidden" class="form-control" name="u_id" id="user_id">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="user_name" id="fullname"
                        placeholder="Enter your full name">
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="user_email" id="email"
                            placeholder="Enter your email">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="user_password" id="password" 
                            placeholder="Enter your password">
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone"
                        placeholder="Enter phone">
                </div>

                <div class="mt-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address"
                        placeholder="Enter your address">
                </div>

                <input type="submit" value="register" class="btn btn-danger text-white mt-4 w-100">
                
            </form>
                 <p> Have an Account <a href="{{ url('/') }}" class="text-danger text-decoration-none"> Login</p></a>
        </div>
    </div>
</div>


    <!-- Include Bootstrap JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"> </script>
    <script src="{{ asset('assets/js/users/register.js') }}"> </script>
</body>
    </html>