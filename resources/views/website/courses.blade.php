<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Courses</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-primary-subtle">
@include('website.layouts.navbar')
  <div class="container my-5">
    <h1 class="mb-4 text-center">All Courses</h1>
    <div class="row">
      @foreach($courses as $course)
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset($course->image) }}" class="card-img-top" alt="{{ $course->title }}" />
          <div class="card-body">
            <h5 class="card-title">{{ $course->title }}</h5>
            <p class="card-text">
              {{ $course->description }}
            </p>
            <form action="{{ route('enrollements.store') }}" method="POST">
              @csrf
              <input type="hidden" name="course_id" value="{{ $course->id }}">
              @if($course->isEnrolled(session('user')->id))
              <button class="btn btn-primary" disabled>{{__("site.you are enrolled")}}</button>
              @elseif($course->seatsLeft > 0)
              <button class="btn btn-primary">Enroll Now</button>
              @else
              <button class="btn btn-primary" disabled>{{__("site.full")}}</button>
              @endif
            </form>

          </div>
        </div>
      </div>
      @endforeach
      {{ $courses->links("pagination::bootstrap-5") }}
    </div>

  </div>

  <footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2025 MasteryPath. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>