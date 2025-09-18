<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Course Details - MasteryPath</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  @include('website.layouts.navbar')

  <div class="container my-5">

    <!-- عنوان الكورس -->
    <h1 class="mb-3">{{ $course->title }}</h1>

    <!-- صورة الكورس -->
    @if($course->image)
    <img src="{{ asset( $course->image) }}" class="img-fluid rounded mb-4" alt="{{ $course->title }}">
    @endif

    <!-- وصف الكورس -->
    <p class="lead">{{ $course->description }}</p>

    <!-- معلومات إضافية -->
    <div class="row mb-4">
      <div class="col-md-4">
        <h5>Instructor</h5>
        <p>{{ $course->instructor->first_name ?? 'Unknown' }}</p>
      </div>
      <div class="col-md-4">
        <h5>Max Students</h5>
        <p>{{ $course->max_students }}</p>
      </div>
      <div class="col-md-4">
        <h5>Category</h5>
        <p>{{ $course->category->namelang() ?? 'N/A' }}</p>
      </div>
      <div class="col-md-4">
        <h5>Status</h5>
        <p>{{ $course->status ? 'Active' : 'Inactive' }}</p>
      </div>
    </div>

    <!-- تشغيل الفيديو -->
    @if($course->video)
    <h4>Course Video</h4>
    <video width="100%" height="auto" controls class="mb-4">
      <source src="{{ asset( $course->video) }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    @endif

    <a href="{{ route('courses') }}" class="btn btn-secondary">Back to Courses</a>

  </div>

  <footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">© 2025 MasteryPath. All Rights Reserved.</p>
  </footer>
</body>

</html>