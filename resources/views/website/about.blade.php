<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{__("site.About MasteryPath")}} - </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="position-relative vh-100 bg-primary-subtle">
  @include('website.layouts.navbar')
  <div class="container my-5">
    <div class="text-center mb-4">
      <h1>{{__("site.About MasteryPath")}}</h1>
      <p class="text-muted">
        {{__("site.Empowering learners with quality education worldwide")}}
      </p>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        
        <p>
         {{__("site.We provide a wide range of courses in")}}
          <strong>{{__("site.technology, design, business,")}}</strong> {{__("site.and more, taught by")}}
          <em>{{__("site.industry professionals")}}</em>.
        </p>
      </div>
    </div>
  </div>

  <footer class="bg-dark text-white text-center py-3 position-absolute bottom-0 w-100">
    <p>&copy; 2025 MasteryPath. All Rights Reserved.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>