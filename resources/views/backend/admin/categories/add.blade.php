@extends('backend.home')
@section('page_title')
    Them loai san pham
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
                    <form action="{{ route('categories.store') }}"   method="post" id="form_sample_1" class="form-horizontal">
                        @csrf
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" name="name"  class="span6 m-wrap" required/>
                                </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">ADD</button>
                            </div>
                        </fieldset>
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
