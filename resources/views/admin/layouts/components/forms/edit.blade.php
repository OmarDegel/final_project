<div class="card card-primary">

    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route($model.'.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- /.card-body -->