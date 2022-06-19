@extends('layouts.web')

@section('page')
    {{-- background image --}}
    <div class="bg-no-repeat bg-cover bg-gray-100" style="background-image: url({{ asset('img/land/land1.jpg') }})">
        {{-- backdrop item --}}
        <div class="backdrop-blur-md bg-gradient-to-t from-white to-white/[0.5] py-6">
            <h1 class="text-center text-4xl font-bold py-2">
                About Us
            </h1>
            <div class="text-center text-yellow-700 py-2">
                <span class="pr-2">~</span>
                <span class="tracking-widest">where real estate gets real</span>
                <span class="pl-2">~</span>
            </div>
        </div>
    </div>

    {{-- about item --}}
    <div class="my-4">
        <div class="md:mx-auto md:w-3/4 w-full">
            @isset($about_text)
                {{-- about us content --}}
                <div class="text-center py-4 md:p-4" id="about-text">
                    {{ $about_text }}
                </div>
            @endisset
        </div>

        {{-- why us item --}}
        <div class="my-4 py-10 backdrop-blur-md bg-gradient-to-t from-gray-100 to-white/50 ">
            {{-- content flex --}}
            <div class="md:p-4 p-2 md:mx-auto md:w-1/2 w-full ">
                <h1 class="text-center text-slate-800 text-3xl font-semibold mb-10">Why Our Customers Choose Us</h1>
                {{-- goal --}}
                <div class="flex items-center my-4 p-4">
                    <div class="w-1/4 p-4">
                        <img src="{{ asset('img/goal.png') }}" alt="" class="w-20">
                    </div>
                    <div class="w-3/4">
                        <h2 class="text-slate-800 text-lg font-semibold py-1">Our Goal</h2>
                        @isset($about_goal)
                            {{-- goal text --}}
                            <p class="text-sm" id="goal">
                                {{ $about_goal }}
                            </p>
                        @endisset
                    </div>
                </div>
                {{-- mission --}}
                <div class="flex items-center my-4 p-4">
                    <div class="w-1/4 p-4">
                        <img src="{{ asset('img/mission.png') }}" alt="" class="w-20">
                    </div>
                    <div class="w-3/4">
                        <h2 class="text-slate-800 text-lg font-semibold py-1">Our mission</h2>
                        @isset($about_mission)
                            {{-- mission text --}}
                            <p class="text-sm" id="mission">
                                {{ $about_mission }}
                            </p>
                        @endisset
                    </div>
                </div>
                {{-- focus --}}
                <div class="flex items-center my-4 p-4">
                    <div class="w-1/4 p-4">
                        <img src="{{ asset('img/focus.png') }}" alt="" class="w-20">
                    </div>
                    <div class="w-3/4">
                        <h2 class="text-slate-800 text-lg font-semibold py-1">Our focus</h2>
                        @isset($about_focus)
                            {{-- focus text --}}
                            <p class="text-sm" id="focus">
                                {{ $about_focus }}
                            </p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>

        {{-- team --}}
        <div class="my-4">
            {{-- team content --}}
            <div class="md:mx-auto md:w-3/4">
                <h1 class="text-center text-slate-800 text-3xl font-semibold">Our Team</h1>
                <div class="flex flex-wrap items-center justify-center">
                    @if (count($staff) > 0)
                        @foreach ($staff as $team)
                            {{-- team item --}}
                            <div class="md:my-10 md:w-1/4 w-full p-10">
                                <div class="relative shadow-xl">
                                    <img src="{{ asset('storage/'.$team->photo) }}" alt=""
                                        class="w-full md:h-60 object-cover">
                                    <div
                                        class="absolute bottom-0 left-0 right-0 bg-white/80 m-2 text-sm font-semibold py-2 shadow-lg">
                                        <div class="text-center">
                                            {{ $team->name }}
                                        </div>
                                        <div class="text-center text-yellow-900">
                                            {{ $team->position }}
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ $team->phone_number }}" class="p-2 text-slate-900 hover:text-blue-800">
                                                <i class="fa fa-phone"></i>
                                            </a>
                                            <a href="{{ $team->email }}" class="p-2 text-slate-900 hover:text-blue-800">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                            <a href="{{ $team->whatsapp_number }}" class="p-2 text-slate-900 hover:text-blue-800">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        Team members unavailable!
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
