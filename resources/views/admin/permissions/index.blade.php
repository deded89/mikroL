@extends('layouts.admin.app')
@section('content')
<div>
    <div class="col-md-12 col-lg-12 d-flex flex-column">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="button" class="btn btn-outline-primary rounded-pill mb-2" data-toggle="modal"
            data-target="#createModal">New Permission</button>
        <div class="card mg-b-30">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-header-title tx-13 mb-0">Permissions List</h6>
                    </div>
                </div>
            </div>
            <div class="card-body pd-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Permission Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $key => $perm)
                            <tr>
                                <th scope="row">{{ $permissions->firstItem() + $key }}</th>
                                <td>{{ $perm->name }}</td>
                                <td class="text-right table-actions">
                                    <form
                                        action="{{ route('admin.permissions.destroy',$perm->id) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-custom-white" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
</div>


<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add New Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.permissions.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="text" name="name" class="form-control" autofocus>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
