@extends("admin.layouts.main.main")
@section('title', __('site.users'))
@section("content")
@include("admin.layouts.main.header_of_page", ["title" => "users"])
@include('admin.layouts.components.messages.success')
@include('admin.layouts.components.messages.displayErrors')
@include('admin.users.includes.table')


@endsection