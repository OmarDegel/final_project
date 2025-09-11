<div class="card card-primary">

    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route($model.'.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- /.card-body -->

