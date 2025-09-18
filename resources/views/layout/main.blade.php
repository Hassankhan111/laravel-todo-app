<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Todo Dashboard')</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
        }

        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px 15px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #495057;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 56px; /* height of navbar */
                left: -250px;
                width: 200px;
                height: 100%;
                z-index: 1000;
            }

            .sidebar.active {
                left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="btn btn-outline-light d-lg-none" id="sidebarToggle">☰</button>
        <a class="navbar-brand ml-4" href="#">Todo Dashboard</a>

        <div class="ml-auto">
            <span class=" text-white mr-3" id="userdeteils">Welcome, User</span>
            <a href="{{ url('/') }}" class="btn btn-sm btn-danger" id="logoutbtton">Logout</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar bg-dark p-5">
                <div class="sidebar-sticky">
                    <a href="{{ url('dashboard') }}">🏠 Dashboard</a>
                    <a href="{{ url('task') }}">📝 All Task</a>
                    <a href="{{ url('pending') }}">➕ Pending</a>
                    <a href="{{ url('complete') }}">✅ Completed</a>
                    <a href="{{ url('overdue') }}">⚠️ Overdue</a>
                    <a href="#">⚙️ Settings</a>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 py-4">
                @yield('main-content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
   <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/js/dashboard/alltask.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        
        //lif not login user 
document.addEventListener("DOMContentLoaded", function () {
    const token = localStorage.getItem("api_token");

    if (!token) {
        window.location.href = "/";
        return;
    }

    fetch("/api/user", {
        method: "GET",
        headers: {
            "Authorization": "Bearer " + token,
            "Accept": "application/json"
        }
    })
    .then(res => res.json())
    .then(response => {
        console.log("User data:", response);

        if (response.success && response.data) {
            document.getElementById("userdeteils").innerText =
                "Welcome, " + response.data.name;

                
        }
    })
    .catch(err => console.error("Error:", err));
});

//logout
document.addEventListener("DOMContentLoaded", function () {
    const token = localStorage.getItem("api_token");

    if (!token) {
        window.location.href = "/";
        return;
    }

    // Logout button click
    document.getElementById("logoutbtton").addEventListener("click", function () {
        fetch("/api/logout", {
            method: "POST",
            headers: {
                "Authorization": "Bearer " + token,
                "Accept": "application/json"
            }
        })
        .then(res => res.json())
        .then(data => {
            console.log("Logout response:", data);

            // Clear localStorage
            localStorage.clear();

            // Redirect to login page
            window.location.href = "/";
        })
        .catch(err => {
            console.error("Logout error:", err);

            // Even if API fails, clear localStorage
            localStorage.clear();
            window.location.href = "/";
        });
    });
});
</script>



</script>

</body>
</html>
