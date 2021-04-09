@extends('backend.home')
@section('page_title')
    Danh sach hoa don chi tiet
@endsection
@section('content')
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Customer Table</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-bordered" id="productTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>contact</th>
                            <th>address</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>{{ $bill->customers->name }}</td>
                                <td>{{ $bill->customers->contact }}</td>
                                <td>{{ $bill->customers->address }}</td>
                                <td></td>
                            </tr>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>contact</th>
                            <th>address</th>
                            <th></th>
                        </tr>
                        </thead>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Product Table</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-bordered" id="productTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($bill->bill_details as $billdetail)
                            <tr>
                                <td>{{ $billdetail->id }}</td>
                                <td>{{ $billdetail->products->name }}</td>
                                <td>{!!  substr($billdetail->products->description,0,60) !!}...</td>
                                <td><img src="{{asset('storage/'.$billdetail->products->img)}}" width="50px"></td>
                                <td>{{ $billdetail->products->price }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
@endsection
