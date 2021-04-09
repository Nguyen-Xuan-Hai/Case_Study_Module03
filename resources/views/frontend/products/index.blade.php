@extends('frontend.home')
@section('content')
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3">
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
    </div>
    <div class="menu-entry" style="display: none">{{ $products->links("pagination::bootstrap-4") }}</div>

@endsection
