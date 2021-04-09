@extends('backend.home')
@section('page_title')
    Cap nhap trang thai
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
                    <form action="{{ route('bills.update',$bill->id) }}"  method="post" id="form_sample_1" class="form-horizontal">
                        @csrf
                        <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                                <input type="text" value="{{ $bill->customers->name }}" name="customer_id"  class="span6 m-wrap" disabled/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Datepay</label>
                            <div class="controls">
                                <input type="date" name="datepay" value="{{ $bill->datepay }}" class="span6 m-wrap" disabled/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Status</label>
                            <div class="controls">
                                <select class="span6 m-wrap" name="status">
                                    <option value="InProcess">1.InProcess</option>
                                    <option value="Resolved">2.Resolved</option>
                                    <option value="Cancelled">3.Cancelled</option>
                                </select>
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
@endsection
