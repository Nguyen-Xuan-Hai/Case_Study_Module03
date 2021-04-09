@extends('backend.home')
@section('page_title')
    Cap nhap danh muc san pham
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
                    <form action="{{ route('$categories.update',$category->id) }}"   method="post" id="form_sample_1" class="form-horizontal">
                        @csrf
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" value="{{ $category->name }}" name="name"  class="span6 m-wrap"/>
                                </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
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
