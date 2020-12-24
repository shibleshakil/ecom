@extends('layouts.adminLayouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('/admin-dashboard') }}" title="Go to Home" class="tip-bottom"><i
                    class="icon-home"></i>
                Home</a> <a href="#">Categories</a> <a href="#" class="current">Edit Main Category</a> </div>
        <h1>Main Categories</h1>
    </div>
    @if ($message = Session::get('error'))
    <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{!! $message !!}</strong>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{!! $message !!}</strong>
    </div>
    @endif
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Edit Main Category</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post"
                            action="{{ url('/admin/categories/edit-main-category/'.$mainCategory->id)}}" name="edit_main_category"
                            id="edit_main_category" novalidate="novalidate">@csrf
                            <div class="control-group">
                                <label class="control-label">Main Category Name</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" value="{{ $mainCategory->name }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Main Category Url</label>
                                <div class="controls">
                                    <input type="text" name="url" id="url" value="{{ $mainCategory->name }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" @if($mainCategory->status == "1")
                                        checked @endif value=="1">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Update Main Category" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection