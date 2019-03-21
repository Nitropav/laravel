@extends('admin.layouts.master')

@section('content')

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-customView_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <form action = "{{asset('admin/gallery')}}" method='post'>
    {!!csrf_field()!!}
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" name="picture" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>

@endsection
