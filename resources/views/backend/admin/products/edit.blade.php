@extends('backend.home')
@section('page_title')
    Cap nhap san pham
@endsection
@section('content')
    <!-- validation -->
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"></div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('products.update',$product->id) }}"  enctype="multipart/form-data" method="post" id="form_sample_1" class="form-horizontal">
                        @csrf
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" value="{{ $product->name }}" name="name"  class="span6 m-wrap"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea class="input-xlarge textarea" id="editor" name="description">{!! $product->description !!}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Price</label>
                                <div class="controls">
                                    <input type="text" name="price" value="{{ $product->price }}" class="span6 m-wrap"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category</label>
                                <select class="custom-select" name="category_id">
                                    <option selected>Choose...</option>
                                    @foreach($categories as $category)
                                        <option
                                            @if($category->id == $product->category_id)
                                            selected
                                            @endif
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="card">
{{--                                    <img style="height: 100px; object-fit: cover" id="output" class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">--}}
                                    <input type="file" class="custom-file-input" onchange="loadFile(event)" id="image" name="img">
                                    <img src="{{asset('storage/'.$product->img)}}" style="width: 80px">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
    <!-- /validation -->


    </div>
    </div>
@endsection
