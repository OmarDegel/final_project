@extends("admin.layouts.main.main")
@section('title', __('site.storage'))
@section("content")
@include("admin.layouts.main.header_of_page", ["title" => "storage"])
@include('admin.layouts.components.messages.success')
@include('admin.layouts.components.messages.displayErrors')
@include('admin.storage.includes.table')

@endsection