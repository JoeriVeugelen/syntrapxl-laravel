@extends('layouts.app')

@section('content')
    <h1 class="font-bold text-4xl my-8">Cursussen</h1>

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

        <div class="bg-white py-8 pr-8 pl-16 border-gray-200 border min-h-64 relative">
            <div class="absolute left-0 bg-red-500 text-white font-bold py-2 px-3"><i class="fa-solid fa-arrow-right"></i></div>
            <div class="grid grid-cols-1 h-full items-center md:grid-cols-4">
                <div class="col-span-3 h-full">
                    <h2 class="font-bold">{{ $course->title }}</h2>
                    <p class="font-thin text-sm pt-4">{{ $course->teaser }}</p>
                </div>
                <div class="flex flex-col h-full pt-8 md:pl-16 md:pt-0">
                    <div class="w-full">
                        <p class="text-red-500 font-bold text-sm">€{{ number_format($course->price_incl, 2) }}</p>
                        <p class="text-black font-thin text-xs">€{{ number_format($course->price_excl, 2) }}</p>
                    </div>
                    <div class="pt-4 w-full">
                        <p class="text-xs font-thin"><i class="{{ $hasKMO ? 'fa-solid fa-check' : 'fa-solid fa-xmark' }} pr-4"></i>Kmo-portefeuille</p>
                        <p class="text-xs font-thin"><i class="{{ $hasCheques ? 'fa-solid fa-check' : 'fa-solid fa-xmark' }} pr-4"></i>Opleidingscheques</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection