<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MasteryPath - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset("website/assets/css/style.css")}}" />
</head>

<body>
  @include("website.layouts.navbar")

  <!-- Hero Section -->
  <section class="bg-primary text-white text-center py-5">
    <div class="container">
      <h1 class="display-4">Welcome to MasteryPath</h1>
      <p class="lead">
        Your gateway to learning the best online courses in tech, business,
        and more.
      </p>
      <a href="courses.html" class="btn btn-light btn-lg">Browse All Courses</a>
    </div>
  </section>

  <!-- Featured Courses -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">new courses</h2>
      <div class="row g-4">
        @foreach ($courses as $course)

        <div class="col-md-4">
          <div class="card">
            <img src="{{ asset($course->image) }}" class="card-img-top" alt="Web Development" />
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

      </div>
      <div class="text-center mt-4">
        <a href="{{ route("courses.index") }}" class="btn btn-success btn-lg">View All Courses</a>
      </div>
    </div>
  </section>

  <footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">© 2025 CourseWise. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>