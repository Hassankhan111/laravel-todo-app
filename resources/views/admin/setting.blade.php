@extends('layout.main')
@section('title')
dashboard
@endsection

@section('main-content')
   <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="todoTableBody">
                        <tr>
                            <td>1</td>
                            <td>Sample Todo</td>
                            <td>Finish the dashboard</td>
                            <td>Pending</td>
                            <td>2025-09-14</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#updateTodoModel">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <!-- JS will load data here -->
                    </tbody>
                </table>
            </div>
            <!-- Update Todo Modal -->
            <div class="modal fade" id="updateTodoModel" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Update Todo</h5>
                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="updateTodoForm">
                                <input type="hidden" id="todo_id">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" id="todo_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="todo_desc" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@push('scripts')