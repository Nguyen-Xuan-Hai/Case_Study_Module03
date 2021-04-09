<!DOCTYPE html>
<html class="no-js">

<head>
    <title>@yield('page_title')</title>
    <!-- Bootstrap -->
    <link href="{{ asset('backend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('backend/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('backend/vendors/easypiechart/jquery.easy-pie-chart.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('backend/assets/styles.css') }}" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
{{--    <script--}}
{{--        src="https://code.jquery.com/jquery-3.6.0.min.js"--}}
{{--        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="--}}
{{--        crossorigin="anonymous"></script>--}}
{{--    <link href="toastr.css" rel="stylesheet"/>--}}
    @toastr_css

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('backend/vendors/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
</head>

<body>
@include('backend.layouts.core.navbar')
<div class="container-fluid">
    <div class="row-fluid">
        @include('backend.layouts.core.left-sidebar')
        <!--/span-->
        <div class="span9" id="content">
            @yield('content')
{{--            <div class="row-fluid">--}}
{{--                <!-- block -->--}}
{{--                <div class="block">--}}
{{--                    <div class="navbar navbar-inner block-header">--}}
{{--                        <div class="muted pull-left">Bill Table</div>--}}
{{--                    </div>--}}
{{--                    <div class="block-content collapse in">--}}
{{--                        <div class="span12">--}}
{{--                            <table class="table table-bordered" id="productTable">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Datepay</th>--}}
{{--                                    <th>Status</th>--}}
{{--                                    <th></th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach ($bills as $key => $bill)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $key + $bills->firstItem() }}</td>--}}
{{--                                        <td><a href="{{ route('billdetail.index',$bill->id) }}">{{ $bill->customers->name }}</a></td>--}}
{{--                                        <td>{{ $bill->datepay }}</td>--}}
{{--                                        <td>{{ $bill->status }}</td>--}}
{{--                                        <td><a class="btn btn-primary" href="{{ route('bills.edit', $bill->id) }}">Edit</a></td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Datepay</th>--}}
{{--                                    <th>Status</th>--}}
{{--                                    <th></th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <div class="dataTables_paginate paging_bootstrap pagination">{{ $bills->links("pagination::bootstrap-4") }}</div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- /block -->
{{--            </div>--}}

{{--            <div class="row-fluid">--}}
{{--                <!-- block -->--}}
{{--                <div class="block">--}}
{{--                    <div class="navbar navbar-inner block-header">--}}
{{--                        <div class="muted pull-left">User Table</div>--}}
{{--                        <div class="muted pull-right" style="margin: 10px"><a class="btn btn-success" href="{{ route('users.create') }}" >Add</a></div>--}}
{{--                    </div>--}}
{{--                    <div class="block-content collapse in">--}}
{{--                        <div class="span12">--}}
{{--                            <table class="table table-bordered" id="productTable">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Email</th>--}}
{{--                                    <th>Role</th>--}}
{{--                                    <th></th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach ($users as $key => $user)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $key + $users->firstItem() }}</td>--}}
{{--                                        <td>{{ $user->name }}</td>--}}
{{--                                        <td>{{ $user->email }}</td>--}}
{{--                                        <td>--}}
{{--                                            @foreach($user->roles as $role)--}}
{{--                                                {{ $role->name. ',' }}--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            <a onclick="return confirm('Are you sure delete : {{ $user->name }}')"--}}
{{--                                               class="btn btn-danger" href="{{ route('users.delete', $user->id) }}">Delete</a>--}}
{{--                                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Email</th>--}}
{{--                                    <th>Role</th>--}}
{{--                                    <th></th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <div class="dataTables_paginate paging_bootstrap pagination">{{ $users->links("pagination::bootstrap-4") }}</div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /block -->--}}
{{--            </div>--}}
        </div>
    </div>
    <hr>
    @include('backend.layouts.core.footer')
</div>
<!--/.fluid-container-->
<script src="{{ asset('backend/vendors/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('backend/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/easypiechart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('backend/assets/scripts.js') }}"></script>
<script src="toastr.js"></script>
<script>
    $(function() {
        // Easy pie charts
        $('.chart').easyPieChart({animate: 1000});
    });

    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

</script>
{{--@jquery--}}
@toastr_js
@toastr_render
</body>

</html>
