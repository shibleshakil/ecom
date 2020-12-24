@extends('layouts.adminLayouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('/admin-dashboard') }}" title="Go to Home" class="tip-bottom"><i
                    class="icon-home"></i>
                Home</a> <a href="#">Categories</a> <a href="#" class="current">View Sub Category</a> </div>
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
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>View Sub Categories</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sub Category Name</th>
                                    <th>Main Category ID</th>
                                    <th>Sub Category Url</th>
                                    <th>Sub Category Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subCategories as $subCat)
                                <tr class="gradeX">
                                    <td>{{$subCat->id}}</td>
                                    <td>{{$subCat->sub_name}}</td>
                                    <td>{{$subCat->parent_id}}</td>
                                    <td>{{$subCat->sub_url}}</td>
                                    <td>{{$subCat->status}}</td>
                                    <td class="center"><a
                                            href="{{url('/admin/categories/edit-sub-category/'.$subCat->id) }}"
                                            class="btn btn-primary btn-mini">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection