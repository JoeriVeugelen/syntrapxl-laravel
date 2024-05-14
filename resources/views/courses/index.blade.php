@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-10">

        <div class="w-full h-full col-span-2 bg-white">
            <div class="px-2 pt-4">
                <h3 onclick="toggleList('sectorList')" class="pb-2 pl-2 text-xs font-bold tracking-wide cursor-pointer">SECTOR  <i class="text-red-500 fa-solid fa-briefcase"></i></h3>
                <div id="sectorList">
                    @foreach ($sectors as $sector)
                        <div class="flex items-center justify-between h-8 px-2">
                            <div class="flex items-center max-w-xs overflow-hidden"> 
                                <input type="checkbox" id="checkbox{{ $sector->id }}" class="hidden" onchange="document.getElementById('icon{{ $sector->id }}').classList.toggle('hidden')"
                                        data-sector-id="{{ $sector->id }}">
                                <label for="checkbox{{ $sector->id }}" class="flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 border border-gray-400 rounded cursor-pointer">
                                    <svg id="icon{{ $sector->id }}" class="hidden w-3 h-3 text-red-500 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill="currentColor" d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                    </svg>
                                </label>
                                <span class="ml-2 text-[10px] font-light whitespace-nowrap overflow-hidden text-ellipsis">{{ $sector->name }}</span>
                            </div>
                            <div class="text-[10px] pr-2 pl-2">
                                <p class="text-gray-400">{{ \App\Models\Course::where('sector_id', $sector->id)->count() }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>


                <h3 onclick="toggleList('durationList')" class="pb-2 pl-2 text-xs font-bold tracking-wide cursor-pointer">DURATION  <i class="text-red-500 fa-solid fa-clock"></i></h3>
                <div id="durationList">
                    @foreach ($durations as $duration)
                        <div class="flex items-center justify-between h-8 px-2">
                            <div class="flex items-center max-w-xs overflow-hidden"> 
                                <input type="checkbox" id="checkboxDuration{{ $duration->id }}" class="hidden" onchange="document.getElementById('iconDuration{{ $duration->id }}').classList.toggle('hidden')"
                                        data-duration-id="{{ $duration->id }}">
                                <label for="checkboxDuration{{ $duration->id }}" class="flex items-center justify-center flex-shrink-0 w-4 h-4 mr-2 border border-gray-400 rounded cursor-pointer">
                                    <svg id="iconDuration{{ $duration->id }}" class="hidden w-3 h-3 text-red-500 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill="currentColor" d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                    </svg>
                                </label>
                                <span class="ml-2 text-[10px] font-light whitespace-nowrap overflow-hidden text-ellipsis">{{ $duration->name }}</span>
                            </div>
                            <div class="text-[10px] pr-2 pl-2">
                                <p class="text-gray-400">{{ \App\Models\Course::where('duration_id', $duration->id)->count() }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-span-8 custom-container" id="courses-container">
            @include('courses.courses_partial', ['courses' => $courses])
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $(document).ready(function() {
            $('input[data-sector-id], input[data-duration-id]').change(function() {
                var selectedSectorIds = $('input[data-sector-id]:checked').map(function() {
                    return $(this).data('sector-id');
                }).get();

                var selectedDurationIds = $('input[data-duration-id]:checked').map(function() {
                    return $(this).data('duration-id');
                }).get();

                $.get('/api/courses', {
                    sector_ids: selectedSectorIds,
                    duration_ids: selectedDurationIds
                }, function(data) {
                    $('#courses-container').html(data);
                });
            });
        });

        // Expand or close list of filters
        function toggleList(listId) {
        var list = document.getElementById(listId);
        if (list.style.display === "none") {
            list.style.display = "block";
        } else {
            list.style.display = "none";
        }
    }
    </script>
@endsection
