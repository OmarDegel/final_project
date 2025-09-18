@extends("admin.layouts.main.main")
@section('title', __('site.courses'))
@section("content")
@include("admin.layouts.main.header_of_page", ["title" => "courses"])
@include('admin.layouts.components.messages.success')
@include('admin.layouts.components.messages.displayErrors')
@include('admin.courses.includes.table')

@endsection