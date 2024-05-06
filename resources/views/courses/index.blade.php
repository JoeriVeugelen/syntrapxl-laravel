@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-6">

        <div class="h-full w-full bg-white">
            {{-- <div class="pl-2 pt-8">
                <h3 class="text-xs font-bold">Opleiding voor</h3>
                <input type="checkbox" class="form-checkbox h-2 w-2"><span class="ml-2 text-xs">Option
                    1</span><br>
                <input type="checkbox" class="form-checkbox h-2 w-2"><span class="ml-2 text-xs">Option
                    1</span><br>
            </div> --}}
            <div class="pl-2 pt-4">
                <h3 class="text-xs font-bold">Sector</h3>
                @foreach ($sectors as $sector)
                    <div class="flex justify-between items-center">
                        <div> <input type="checkbox" class="form-checkbox h-2 w-2 accent-red-500"><span
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

        <div class="col-span-5 custom-container">
            <h1 class="font-bold text-4xl mt-8">Opleidingen</h1>
            <p class="mb-8 text-xs"><span class="font-bold text-red-500 text-xs">{{ $courses->count() }}</span> opleidingen
                gevonden.</p>

            <div class="grid gap-8">
                @foreach ($courses as $course)
                    @php
                        $hasKMO = false;
                        $hasCheques = false;
                    @endphp

                    <!-- Get Course Savings -->
                    @foreach ($course->savings as $saving)
                        @if ($saving->name == 'kmo')
                            @php
                                $hasKMO = true;
                            @endphp
                        @elseif ($saving->name == 'cheques')
                            @php
                                $hasCheques = true;
                            @endphp
                        @endif
                    @endforeach

                    <a href="{{ route('courses.show', $course) }}">
                        <div
                            class="bg-white py-8 pr-8 pl-16 border-gray-200 border min-h-64 relative cursor-pointer overflow-hidden">
                            <div class="absolute left-0 bg-red-500 text-white font-bold py-2 px-3"><i
                                    class="fa-solid fa-arrow-right"></i></div>
                            <div class="grid grid-cols-1 h-full items-center md:grid-cols-10">
                                <div class="col-span-6 h-full">
                                    <h2 class="font-bold">{{ $course->title }}</h2>
                                    <p class="font-thin text-sm pt-4">{{ $course->teaser }}</p>
                                </div>
                                <div class="flex flex-col w-full h-full pt-8 md:pl-16 md:pt-0">
                                    <div class="w-full">
                                        <p class="text-red-500 font-bold text-sm">
                                            €{{ number_format($course->price_incl, 2) }}</p>
                                        <p class="text-black font-thin text-xs">€{{ number_format($course->price_excl, 2) }}
                                        </p>
                                    </div>
                                    <div class="pt-4 w-full">
                                        <p class="text-xs font-thin w-[1000px]"><i
                                                class="{{ $hasKMO ? 'fa-solid fa-check' : 'fa-solid fa-xmark' }} pr-4"></i>Kmo-portefeuille
                                        </p>
                                        <p class="text-xs font-thin w-[1000px]"><i
                                                class="{{ $hasCheques ? 'fa-solid fa-check' : 'fa-solid fa-xmark' }} pr-4"></i>Opleidingscheques
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
@endsection
