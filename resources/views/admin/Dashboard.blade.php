@extends('layout.main')
@section('title')
    Dashboard
@endsection


@section('main-content')

    <!-- Main Content -->
             <h3 class="mb-4 text-warning">
                <i class="fas fa-hourglass-half"></i> Dashboard
            </h3>

    <!-- Search -->
    <div class="input-group mb-3">
        <input type="text" id="search" class="form-control" placeholder="Search todos...">
        <div class="input-group-append">
            <button class="btn btn-primary">Search</button>
        </div>
    </div>
    <div class="container my-5">
        <div class="row text-center">

            <!-- Total Tasks -->
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-primary">
                    <div class="card-body">
                        <i class="fas fa-tasks fa-2x text-primary mb-2"></i>
                        <h5 class="card-title text-primary">Total Tasks</h5>
                        <h2 class="font-weight-bold" id="totaltask">4</h2>
                    </div>
                </div>
            </div>

            <!-- Pending -->
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-warning">
                    <div class="card-body">
                        <i class="fas fa-hourglass-half fa-2x text-warning mb-2"></i>
                        <h5 class="card-title text-warning">Pending</h5>
                        <h2 class="font-weight-bold" id="totalpending">4</h2>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-success">
                    <div class="card-body">
                        <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                        <h5 class="card-title text-success">Completed</h5>
                        <h2 class="font-weight-bold" id="totalcomplete">2</h2>
                    </div>
                </div>
            </div>

            <!-- Overdue -->
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-danger">
                    <div class="card-body">
                        <i class="fas fa-exclamation-triangle fa-2x text-danger mb-2"></i>
                        <h5 class="card-title text-danger">Overdue</h5>
                        <h2 class="font-weight-bold" id="totaloverdate">1</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--progress bar -->
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-chart-line"></i> Progress Overview</h5>
            </div>
            <div class="card-body">

                <!-- Total Tasks -->
                <p class="mb-1"><i class="fas fa-tasks text-primary"></i> Total Tasks <span
                        class="float-right font-weight-bold">4</span></p>
                <div class="progress mb-3">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="4"
                        aria-valuemin="0" aria-valuemax="4">100%</div>
                </div>

                <!-- Completed -->
                <p class="mb-1"><i class="fas fa-check-circle text-success"></i> Completed <span
                        class="float-right font-weight-bold">2</span></p>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="2"
                        aria-valuemin="0" aria-valuemax="4">50%</div>
                </div>

                <!-- Pending -->
                <p class="mb-1"><i class="fas fa-hourglass-half text-warning"></i> Pending <span
                        class="float-right font-weight-bold">0</span></p>
                <div class="progress mb-3">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="4">0%</div>
                </div>

                <!-- Overdue -->
                <p class="mb-1"><i class="fas fa-exclamation-triangle text-danger"></i> Overdue <span
                        class="float-right font-weight-bold">1</span></p>
                <div class="progress mb-0">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="1"
                        aria-valuemin="0" aria-valuemax="4">25%</div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
     const token = localStorage.getItem("api_token");

    if (!token) {
        window.location.href = "/";
        return;
    }
    fetch('/api/todos', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
        }
    })
        .then(response => response.json())
        .then(data => {
            //console.log(data.data.todos); 
            var alltodos = data.data.todos;
            document.getElementById('totaltask').innerText = alltodos.length;
            
            
            const pend = alltodos.filter(alltodos=>alltodos.status === 'pending').length;
            document.getElementById('totalpending').innerText = pend;
            
            
               const complete = alltodos.filter(alltodos=>alltodos.status === 'completed').length;
             document.getElementById('totalcomplete').innerText = complete;
             
              const dat = new Date();
               const date = alltodos.filter(alltodos=>alltodos.due_date !== dat).length;
              document.getElementById('totaloverdate').innerText = date;
            
            
        });

</script>

</script>
@endpush