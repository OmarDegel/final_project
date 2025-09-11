@extends("admin.layouts.main.main")
@section('title', __('site.users'))
@section("select2")
<link rel="stylesheet" href="{{asset('dashboard/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/plugins/dropzone/min/dropzone.min.css')}}">
@endsection
@section("content")
@include("admin.layouts.main.header_of_page", ["title" => "users"])
@include('admin.layouts.components.messages.displayErrors')
@include('admin.layouts.components.forms.create',["model" => "users"])
<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      @include('admin.layouts.components.forms.inputs.text',
      ["name" => "first_name", "label" => "first_name",'id' => "first_name"])
    </div>
    <div class="col-md-6">
      @include('admin.layouts.components.forms.inputs.text',
      ["name" => "last_name", "label" => "last_name",'id' => "last_name"])
    </div>
    <div class="col-md-6">
      @include('admin.layouts.components.forms.select.select2',[
      'name' => 'role_id',
      'label' => 'role',
      'types' => $roles
      ])
    </div>
    <div class="col-md-6">
      @include('admin.layouts.components.forms.inputs.text',
      ["name" => "email", "label" => "email",'id' => "email"])
    </div>
    <div class="col-md-6">
      @include('admin.layouts.components.forms.inputs.password',
      ["name" => "password", "label" => "password",'id' => "password"])
    </div>
    <div class="col-md-6">
      @include('admin.layouts.components.forms.inputs.password',
      ["name" => "password_confirmation", "label" => "password_confirmation",'id' => "password_confirmation"])
    </div>
    <div class="col-md-6">
      @include('admin.layouts.components.forms.select.select2',[
      'name' => 'lang',
      'label' => 'lang',
      'types' => ['ar' => 'Arabic', 'en' => 'English']
      ])
    </div>
    <div class="col-md-6">
      @include('admin.layouts.components.forms.select.select2',[
      'name' => 'type',
      'label' => 'type',
      'types' => ['admin' => 'Admin', 'user' => 'User']
      ])
    </div>
    <div class="col-md-6">
      @include('admin.layouts.components.forms.inputs.text',
      ["name" => "phone", "label" => "phone",'id' => "phone"])
    </div>
  </div>
  @include('admin.layouts.components.forms.file.dropzoneimage', [
  'name' => 'image',
  ])
</div>


</div>
@include('admin.layouts.components.buttons.submit')
@include('admin.layouts.components.forms.form-close')
@section("js")
<script src="{{asset('dashboard/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/dropzone/min/dropzone.min.js')}}"></script>
@include('admin.layouts.components.forms.file.dropzone')

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
@endsection
@endsection