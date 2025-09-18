@extends("admin.layouts.main.main")
@section('title', __('site.enrollements'))
@section("content")
@include("admin.layouts.main.header_of_page", ["title" => "enrollements"])
@include('admin.layouts.components.messages.success')
@include('admin.layouts.components.messages.displayErrors')
@include('admin.enrollements.includes.table')

@endsection