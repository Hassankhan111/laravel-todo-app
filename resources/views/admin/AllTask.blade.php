@extends('layout.main')

@section('main-content')
             <h3 class="mb-4 text-warning">
                <i class="fas fa-hourglass-half"></i> All Tasks
            </h3>
    
            <div class="table-responsive">
                <table class="tasktable table table-bordered table-hover">
                   
                  
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
@endsection

@push('scripts')