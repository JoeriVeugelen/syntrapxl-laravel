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
                        class="fa-solid fa-arrow-right"></i>
                </div>
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
