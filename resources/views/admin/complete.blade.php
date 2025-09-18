@extends('layout.main')

@section('main-content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-4 text-warning">
                <i class="fas fa-hourglass-half"></i> Completed Tasks
            </h3>

            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-warning table-dark ">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="completedTasksTable">
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Loading pending tasks...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const token = localStorage.getItem('api_token');

    fetch('/api/todos', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        const alltodos = data.data.todos;
        const complete = alltodos.filter(alltodos => alltodos.status === 'completed');
        const tbody = document.getElementById('completedTasksTable');
        tbody.innerHTML = "";

        if (complete.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-muted">No Completed tasks 🎉</td>
                </tr>
            `;
        } else {
            complete.forEach((alltodos, index) => {
                tbody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${alltodos.title}</td>
                        <td>${alltodos.description}</td>
                        <td>${alltodos.due_date ?? '-'}</td>
                        <td><span class="badge bg-warning text-dark">${alltodos.status}</span></td>
                    </tr>
                `;
            });
        }
    })
    .catch(error => {
        console.error('Error fetching todos:', error);
    });
});
</script>
@endpush

