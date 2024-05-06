<h1>Courses</h1>

@foreach ($courses as $course)
    <div>
        <h2>{{ $course->title }}</h2>
        <p>{{ $course->teaser }}</p>
        <p class="text-red-500">{{$course->price_incl}}</p>
    </div>
@endforeach