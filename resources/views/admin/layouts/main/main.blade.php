@include("admin.layouts.main.head")

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include("admin.layouts.main.navbar")
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include("admin.layouts.main.sidebar")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @yield("content")
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include("admin.layouts.main.footer")

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  @include("admin.layouts.main.scripts")
</body>

</html>