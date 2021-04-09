@extends('backend.home')
@section('page_title')
    Danh sach hoa don
@endsection
@section('content')
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Bordered Table</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-bordered" id="productTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Datepay</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($bills as $key => $bill)
                            <tr>
                                <td>{{ $key + $bills->firstItem() }}</td>
                                <td><a href="{{ route('billdetail.index',$bill->id) }}">{{ $bill->customers->name }}</a></td>
                                <td>{{ $bill->datepay }}</td>
                                <td>{{ $bill->status }}</td>
                                <td><a class="btn btn-primary" href="{{ route('bills.edit', $bill->id) }}">Edit</a></td>
                                <td></td>
                            </tr>
                        @endforeach
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Datepay</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_bootstrap pagination">{{ $bills->links("pagination::bootstrap-4") }}</div>

                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
@endsection
