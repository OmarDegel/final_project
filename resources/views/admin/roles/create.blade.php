@extends("admin.layouts.main.main")
@section('title', __('site.roles'))
@section("content")
@include("admin.layouts.main.header_of_page", ["title" => "roles"])
@include('admin.layouts.components.messages.displayErrors')
@include('admin.layouts.components.forms.create',["model" => "roles"])
<div class="card-body">
    @include('admin.layouts.components.forms.inputs.text',
    ["name" => "name", "label" => "name",'id' => "name"])
    @include('admin.layouts.components.forms.inputs.text',
    ["name" => "display_name", "label" => "display_name",'id' => "display_name"])
    @include('admin.roles.permissions.form_permisions',[
    'groupedPermissions' => $groupedPermissions
    ])
</div>
@include('admin.layouts.components.buttons.submit')
@include('admin.layouts.components.forms.form-close')

@endsection