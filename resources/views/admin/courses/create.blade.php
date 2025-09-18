@extends("admin.layouts.main.main")
@section('title', __('site.courses'))
@section("select2")
<link rel="stylesheet" href="{{asset('dashboard/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/plugins/dropzone/min/dropzone.min.css')}}">
@endsection
@section("content")
@include("admin.layouts.main.header_of_page", ["title" => "courses"])

@include('admin.layouts.components.messages.displayErrors')

@include('admin.layouts.components.forms.create',["model" => "courses"])

@include('admin.courses.includes.form-fields')

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