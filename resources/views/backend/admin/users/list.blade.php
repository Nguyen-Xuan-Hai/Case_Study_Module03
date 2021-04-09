@extends('backend.home')
@section('page_title')
    Danh sach san pham
@endsection
@section('content')
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Bordered Table</div>
                <div class="muted pull-right" style="margin: 10px"><a class="btn btn-success" href="{{ route('users.create') }}" >Add</a></div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-bordered" id="productTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + $users->firstItem() }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{ $role->name. ',' }}
                                    @endforeach
                                </td>

                                <td>
                                    <a onclick="return confirm('Are you sure delete : {{ $user->name }}')"
                                       class="btn btn-danger" href="{{ route('users.delete', $user->id) }}">Delete</a>
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                        </thead>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_bootstrap pagination">{{ $users->links("pagination::bootstrap-4") }}</div>

                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
@endsection
