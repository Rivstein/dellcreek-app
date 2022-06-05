@extends('layouts.web')


@section('page')

{{-- hero section --}}
<div class="container bg-gray-300 min-w-full bg-no-repeat bg-cover"
    style="background-image: url('{{ url('img/land/land1.jpg') }}')">
    {{-- blur layer --}}
    <div class="min-w-full p-0 pb-10 md:p-10 min-h-full backdrop-blur-md bg-gradient-to-t from-white to-white/[0.5]">
        {{-- containt container --}}
        <div class="mx-auto md:px-10 px-5 p-2">
            <div class="flex items-center flex-wrap md:p-0 pt-5">
                {{-- text --}}
                <div class="md:w-1/2 text-center md:mb-0 mb-14 md:text-left">
                    <h2 class="md:text-5xl text-3xl font-bold mb-6">
                        Discover, buy and sell property with ease
                    </h2>
                    <h4 class="md:text-2xl text-xl md:w-4/5 text-gray-700 mb-10">
                        Dellcreek is Africa's property marketplace
                    </h4>
                    <div class="flex justify-center md:justify-start">
                        {{-- item --}}
                        <a href="#"
                            class="bg-blue-600 hover:bg-blue-700 hover:shadow-md mr-3 rounded-md text-white font-bold shadow px-8 py-2">
                            Discover
                        </a>
                        {{-- item --}}
                        <a href="#"
                            class="bg-white hover:shadow-md hover:shadow-blue-700 ml-3 border-solid border border-blue-600 rounded-md text-blue-600 font-bold shadow px-8 py-2">
                            Sell Property
                        </a>
                    </div>
                </div>

                {{-- highlighted property image --}}
                <div class="md:w-1/2 md:pl-10">
                    <a href="#">
                        <div
                            class="transition ease-in-out duration-700 hover:scale-105 mx-2 bg-white rounded-lg drop-shadow-xl hover:drop-shadow-2xl">
                            {{-- image --}}
                            <div>
                                <img src="{{ asset('img/land/land6.jpg') }}"
                                    class="w-full min-w-full h-64 md:h-96 object-cover rounded-t-lg" alt="">
                            </div>
                            {{-- text --}}
                            <div class="py-4 px-6">
                                text
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- properties --}}
<div class="w-full mx-0 bg-gradient-to-t from-gray-100 md:px-8 px-3">
    {{-- title --}}
    <h1 class="text-center text-3xl pt-10 mb-10 font-bold">Properties for sell</h1>

    @if (count($properties) > 0)

        {{-- properties listing --}}
        <div class="flex flex-wrap">

            @foreach ($properties as $property)
                {{-- property --}}
                <div class="md:w-1/3 w-full p-2 md:p-8 mb-8 md:mb-5">
                    @include('web.inc.property',['property' => $property])
                </div>   
            @endforeach

        </div>

    @else
        
    @endif
    
    {{-- discover more btn --}}
    <div class="text-center pt-4 pb-20">
        <a href="#" class="bg-blue-600 hover:bg-blue-700 hover:shadow-lg py-4 px-8 shadow text-white rounded font-bold">
            View more properties
        </a>
    </div>
</div>

{{-- subscribe --}}
<div class="w-full py-10 bg-yellow-400">
    {{-- title --}}
    <h1 class="text-center text-3xl pt-10 mb-10 font-bold">
        Subscribe for updates
    </h1>
    <div class="flex flex-wrap mx-auto px-10 items-center">
        <div class="p-5 md:w-1/2 flex justify-center">
            <img src="{{ asset('img/illustrations/subscribe.png') }}" alt="subscribe illustration">
        </div>
        <div class="p-5">
            <div class="font-semibold text-md md:w-2/3 md:text-left text-center">
                Subscribe to get updates on listed properties, news and all things
                property.
            </div>
            <form action="">
                @csrf
                <div class="my-5 bg-white md:w-2/3 py-2 px-4 border border-gray-400 rounded-md shadow-md hover:shadow-lg">
                    <input type="email" class="w-full" placeholder="Enter email">
                </div>
                <div class="mb-3 bg-white md:w-2/3 py-2 px-4 border border-gray-400 rounded-md shadow-md hover:shadow-lg">
                    <input type="text" placeholder="Phone number">
                </div>
                <div class="md:text-left text-center">
                    <button class="bg-gray-700 text-white py-2 px-4 rounded shadow">
                        Subscribe
                    </button>    
                </div>
                
            </form>
        </div>   
    </div>
</div>

@endsection