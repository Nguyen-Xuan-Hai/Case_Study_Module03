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
                <div class="muted pull-right" style="margin: 10px"><a class="btn btn-success" href="{{ route('categories.create') }}" >Add</a></div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-bordered" id="productTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $key + $categories->firstItem() }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a onclick="return confirm('Are you sure delete : {{ $category->name }}')"
                                       class="btn btn-danger" href="{{ route('categories.delete', $category->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_bootstrap pagination">{{ $categories->links("pagination::bootstrap-4") }}</div>

                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
@endsection
