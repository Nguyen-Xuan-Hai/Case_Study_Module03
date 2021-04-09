@extends('frontend.menu')
@section('content')
    <section class="ftco-menu">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row d-md-flex">
                <div class="col-lg-12 ftco-animate p-md-5">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">

                            <div class="tab-content ftco-animate" id="v-pills-tabContent">

{{--                                <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">--}}
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-md-3" >
                                                <div class="menu-entry">
                                                    <img src="{{ asset('storage/' . $product->img) }}" class="img">
                                                    <div class="text text-center pt-4">
                                                        <h3>{{ $product->name}}</h3>
                                                        <p> {!! substr($product->description, 0, 60) !!}  ...</p>
                                                        <ins>{{ number_format($product->price, 0, '.','.') }}đ</ins>
                                                        <p><a href="{{ route('cart.addToCart', $product->id) }}" class="btn btn-primary btn-outline-primary" >Add to Cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
{{--                                    </div>--}}
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
