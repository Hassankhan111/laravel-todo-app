<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP & JavaScript Fetch CRUD</title>

  <!-- Bootstrap -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/stylee.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container my-4">
    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 bg-primary p-3 rounded shadow-sm text-white">
      <h2 class="text-center text-md-start">Todo List</h2>
      <div class="mt-3 mt-md-0">
        <label class="me-2 fw-bold">Search:</label>
        <input type="text" id="search" class="form-control d-inline-block w-auto" autocomplete="off">
         <td><button class="btn btn-sm btn-warning"><a href="dashboard"> Dashboard</a></button></td>
      </div>
    </div>

    <!-- Table Data -->
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h3 class="h5"><button class="btn btn-primary btn-sm" data-bs-todos="@getbootstrap" data-toggle="modal" data-target="#addtodoModal">➕ Add New</button>
           </h3>
            <button class="logoutbtn btn btn-primary btn-sm">➕ logout</button>
             
        </div>
        <div class="table-responsive">
          <table class="table-data table table-bordered table-hover text-center align-middle">
            <!-- Table Head -->
          </table>
        </div>
      </div>
    </div>

    <!-- Messages -->
    <div id="error-message" class="text-danger mt-3"></div>
    <div id="success-message" class="text-success mt-3"></div>
  </div>

  <!-- Add todo Modal -->
  <div class="addtodos modal fade" id="addtodoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Todos</h5>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-body">
          <form id="addTodo-form">
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" id="title" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="text" id="desc" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Due-date</label>
               <input type="text" id="due_date" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <input type="text" id="status" class="form-control">
            </div>
            <input type="submit" value="Submit" class="btn btn-success">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="updateTodoModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Todos</h5>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-body">
          <form id="formupdate">
              <input type="hidden" id="td_id" name="todo_id" class="form-control">
              
              <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" id="todo_title" name="title" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="text" id="todo_desc" name="description" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <input type="text" id="todo_status" name="status" class="form-control">
            </div>
              <div class="mb-3">
              <label class="form-label">Due-date</label>
               <input type="text" id="todo_due_date" name="date" class="form-control">
            </div>
            <input type="submit" value="Update" class="btn btn-success">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/js/tdoes/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
</body>
</html>
