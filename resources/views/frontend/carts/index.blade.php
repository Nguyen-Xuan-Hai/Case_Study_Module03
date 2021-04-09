<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    @toastr_css

    <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>
<body>
@include('frontend.layouts.navbar')
<!-- END nav -->

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Cart</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Cart</span></p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <form action="{{ route('cart.update') }}" method="post">
                        @csrf
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th ><a onclick="return confirm('Are you sure delete all product')" href="{{ route('cart.delete') }}"><span class="icon-remove" style="background: #0b0b0b"></span></a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->items as $key => $item)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td></td>
                                <td>{{ $item['product']->name }}</td>
                                <td><img src="{{ asset('storage/'.$item['product']->img) }}" width="50px"></td>
                                <td>{{ $item['product']->price }}</td>
                                <td><input name="quantity_product[{{$key}}]" data-id="{{$key}}" type="number" class="quantity_product" value="{{ $item['totalQty'] }}">
                                    <button type="submit"><span class="icon-update"></span></button>
                                </td>
                                <td>{{ $item['totalPrice'] }}</td>
                                <td class="product-remove"><a onclick="return confirm('Are you sure delete : {{ $item['product']->name }}')" href="{{ route('cart.removeProduct', $key) }}"><span class="icon-remove"></span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
{{--                    <p class="d-flex">--}}
{{--                        <span>Subtotal</span>--}}
{{--                        <span>$20.60</span>--}}
{{--                    </p>--}}
{{--                    <p class="d-flex">--}}
{{--                        <span>Delivery</span>--}}
{{--                        <span>$0.00</span>--}}
{{--                    </p>--}}
{{--                    <p class="d-flex">--}}
{{--                        <span>Discount</span>--}}
{{--                        <span>$3.00</span>--}}
{{--                    </p>--}}
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>{{ number_format($cart->totalPrice, 0, '.','.') }}</span>
                    </p>
                </div>
                <p class="text-center"><a href="{{ route('cart.checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
</section>


@include('frontend.layouts.footer')


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.j') }}s"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('frontend/js/google-map.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
@toastr_js
@toastr_render



</body>
</html>
