@extends("admin.layouts.main.main")
@section('title', __('site.categories'))
@section("content")
@include("admin.layouts.main.header_of_page", ["title" => "categories"])
@include('admin.layouts.components.messages.success')
@include('admin.layouts.components.messages.displayErrors')
@include('admin.categories.includes.table')

@endsection