@extends('layouts.adminLayouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('/admin-dashboard') }}" title="Go to Home" class="tip-bottom"><i
                    class="icon-home"></i>
                Home</a> <a href="#">Categories</a> <a href="#" class="current">Add Sub Category</a> </div>
        <h1>Sub Categories</h1>
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
                        <h5>Add Sub Category</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post"
                            action="{{ url('/admin/categories/add-sub-category')}}" name="add_sub_category"
                            id="add_sub_category" novalidate="novalidate">@csrf
                            <div class="control-group">
                                <label class="control-label">Sub Category Name</label>
                                <div class="controls">
                                    <input type="text" name="sub_name" id="sub_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Main Category Level</label>
                                <div class="controls" style="width:245px;">
                                    <select name="parent_id" id="parent_id">
                                        <option value="0">Select Main Category</option>
                                        @foreach($mainCategories as $mainCat)
                                        <option value="{{ $mainCat->id }}">{{ $mainCat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sub Category Url</label>
                                <div class="controls">
                                    <input type="text" name="sub_url" id="sub_url">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" value="1">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Add Sub Category" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection