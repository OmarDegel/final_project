@extends("admin.layouts.main.main")
@section('title', __('site.roles'))
@section("content")
@include("admin.layouts.main.header_of_page", ["title" => "roles"])
@include('admin.layouts.components.messages.success')
@include('admin.layouts.components.messages.displayErrors')
@include('admin.roles.includes.table')


@endsection