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
                <div class="muted pull-right" style="margin: 10px"><a class="btn btn-success" href="{{ route('products.create') }}" >Add</a></div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-bordered" id="productTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>price</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key + $products->firstItem() }}</td>
                                <td>{{ $product->name }}</td>
                                <td> {!! substr($product->description, 0, 50) !!}  ...</td>
                                <td>{{ number_format($product->price, 0, '.','.') }}đ</td>
                                <td>{{ $product->categories->name }}</td>
                                <td><img src="{{asset('storage/'.$product->img)}}" width="50px"></td>
                                <td>
                                    <a onclick="return confirm('Are you sure delete : {{ $product->name }}')"
                                       class="btn btn-danger" href="{{ route('products.delete', $product->id) }}">Delete</a>
                                    <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>price</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th></th>
                        </tr>
                        </thead>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_bootstrap pagination">{{ $products->links("pagination::bootstrap-4") }}</div>

                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
@endsection
