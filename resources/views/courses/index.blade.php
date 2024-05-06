@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-6">

        <div class="h-full w-full bg-white">

            <div class="pl-2 pt-4">
                <h3 class="text-xs font-bold">Sector</h3>
                @foreach ($sectors as $sector)
                    <div class="flex justify-between items-center">
                        <div> <input type="checkbox" class="form-checkbox h-2 w-2 accent-red-500"
                                data-sector-id="{{ $sector->id }}"><span
                                class="ml-2 text-[10px] font-light">{{ $sector->name }}
                            </span><br></div>
                        <div class="text-[10px] pr-2">
                            <p class="text-gray-400">{{ \App\Models\Course::where('sector_id', $sector->id)->count() }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="col-span-5 custom-container" id="courses-container">
            @include('courses.courses_partial', ['courses' => $courses])
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[data-sector-id]').change(function() {
                var selectedSectorIds = $('input[data-sector-id]:checked').map(function() {
                    return $(this).data('sector-id');
                }).get();

                $.get('/api/courses', {
                    sector_ids: selectedSectorIds
                }, function(data) {
                    $('#courses-container').html(data);
                });
            });
        });
    </script>
@endsection
