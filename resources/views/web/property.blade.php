@extends('layouts.web')

@section('page')

<div class="md:mx-auto md:w-3/4 md:p-4">

    {{-- images --}}
    <div class="relative">
        <a href="#" class="flex md:h-80 h-64 group" data-bs-toggle="modal" data-bs-target="#propertyImages">
            {{-- main --}}
            <div class="p-1 md:w-3/4 w-full">
                <img class="md:rounded-tl-xl md:rounded-bl-xl w-full h-full object-cover shadow-md"
                    src="{{ asset('storage/'.$property->image) }}" alt="{{ $property->name.$property->image }}">
            </div>
            {{-- other images --}}
            <div class="md:w-1/4 w-full">
                <div class="p-1 h-1/2">
                    <img class="block md:rounded-tr-xl w-full h-full object-cover shadow-md"
                        src="
                        @isset($property->images[0])
                            {{ asset('storage/'.$property->images[0]['path']) }}
                        @else 
                            {{ asset('img/no-img.png') }}
                        @endisset
                        " alt="{{ $property->name.$property->image }}">
                </div>
                <div class="p-1 h-1/2">
                    <img class="block md:rounded-br-xl w-full h-full object-cover shadow-md"
                        src="
                        @isset($property->images[1])
                            {{ asset('storage/'.$property->images[1]['path']) }}
                        @else 
                            {{ asset('img/no-img.png') }}
                        @endisset
                        " alt="{{ $property->name.$property->image }}">
                </div>
            </div>
        </a>
        {{-- for sale and title deed badge --}}
        <div class="absolute top-0 left-0 m-4">
            <div class="flex items-center">
                <div class="bg-white shadow-lg mx-2 rounded px-2 py-1 font-semibold text-xs">
                    FOR SALE
                </div>
                @if ($property->hasTitle)
                    <div class="bg-white shadow-lg mx-2 rounded px-2 py-1 font-semibold text-xs">
                        <i class="fa-solid fa-certificate text-red-600"></i>
                        TITLE DEED
                    </div>    
                @endif
            </div>
        </div>
        {{-- total images badge --}}
        <div class="absolute bottom-0 right-0 m-4">
            <span class="bg-black text-white shadow-lg rounded px-2 py-1 font-semibold text-sm">
                <i class="fa fa-images pr-1"></i>
                <span>{{ count($property->images)+1 }}</span>
            </span>
        </div>
    </div>


    {{-- main row --}}
    <div class="flex flex-wrap my-5">

        {{-- information --}}
        <div class="md:w-2/3 w-full p-2 px-4 md:px-2">

            {{-- details --}}
            <div class="md:flex justify-between mb-8">
                {{-- name --}}
                <div class="md:w-1/2 mb-7">
                    <h2 class="text-2xl mb-2 font-bold">
                        {{ $property->name }}
                    </h2>
                    {{-- location --}}
                    <div class="mb-2">
                        <i class="fa-solid fa-location-dot pr-2 text-yellow-500"></i>
                        {{ $property->county }},
                        {{ $property->sub_county }}
                    </div>
                    {{-- size/dimensions --}}
                    <div>
                        <i class="fa-solid fa-ruler-combined pr-2 text-yellow-500"></i>
                        {{ $property->dimensions }}
                    </div>
                    {{-- title deed --}}
                    @if ($property->hasTitle)
                        <div class="mt-2 font-bold">
                            <i class="fa-solid fa-certificate pr-2 text-red-600"></i>
                            Title deed available.
                        </div>   
                    @endif
                </div>
                {{-- price --}}
                <div class="md:w-1/2 md:text-right">
                    <h2 class="text-3xl mb-2 font-bold">
                        Ksh {{ number_format($property->price) }}
                    </h2>
                    {{-- deposite --}}
                    <div class="text-sm">
                        Min. Deposit
                        <span class="font-semibold">
                            Ksh {{ number_format($property->price*0.1) }}
                        </span>
                    </div>
                    {{-- check installments --}}
                    <button type="button" class="btn-warning my-3 md:float-right" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Calculate Installments
                    </button>
                </div>
            </div>

            {{-- watch property --}}
            <div class="bg-green-100 text-center shadow-lg border border-green-600 p-4 mb-8">
                <div class="font-semibold text-sm mb-3">
                    <b class="bg-green-400 px-1 mr-1 rounded-md">{{ count($property->watchers) }}</b> 
                    people are watching this property
                </div>
                @auth
                    @if (auth()->user()->watching()->find($property->id))
                        {{-- unwatch --}}
                        <div class="font-semibold bg-green-400 inline-block p-2 rounded shadow-lg mb-3"> 
                            You are watching this property
                        </div>
                        <form action="{{ route('unwatch',['property_id' => $property->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-400 text-sm font-bold px-4 py-1 rounded shadow-md hover:bg-red-300 hover:shadow-lg">
                                <i class="fa fa-eye-slash pr-2"></i>
                                Unwatch property
                            </button>    
                        </form>
                    @else
                        {{-- watch --}}
                        <form action="{{ route('watch',['property_id' => $property->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-400 text-sm font-bold px-4 py-1 rounded shadow-md hover:bg-green-300 hover:shadow-lg">
                                <i class="fa fa-eye pr-2"></i>
                                Watch property
                            </button>    
                        </form>    
                    @endif

                    {{-- my watched properties --}}
                    <a href="{{ url('profile') }}" class="block mt-4 font-semibold text-blue-800 text-sm hover:underline">
                        View watched properties
                    </a>
                @else
                    <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="bg-green-400 text-sm font-bold px-4 py-1 rounded shadow-md hover:bg-green-300 hover:shadow-lg">
                        <i class="fa fa-eye pr-2"></i>
                        Watch property
                    </button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="inline-block w-full mt-4 font-semibold text-blue-800 text-sm hover:underline">
                        View watched properties
                    </button>
                @endauth
            </div>

            {{-- location and map --}}
            <div class="mb-8">
                <h1 class="text-2xl mb-3 font-bold">
                    Local Information
                </h1>
                {{-- location --}}
                <div class="mb-10 flex items-center bg-blue-100 p-3 rounded-md shadow-md">
                    <i class="fa fa-info-circle text-blue-800 pr-6"></i>
                    <span class="text-sm font-semibold">{{ $property->location }}</span>
                </div>
                {{-- map --}}
                <div class="w-full">
                    {!! $property->map !!}
                </div>
            </div>

            {{-- Description --}}
            <div class="mb-8">
                <h1 class="text-2xl mb-3 font-bold">
                    Description
                </h1>
                {{-- Description --}}
                <div class="w-full">
                    {!! $property->description !!}
                </div>
            </div>

        </div>

        {{-- client actions --}}
        <div class="md:w-1/3 w-full md:pl-8  p-2">
         {{-- request actions --}}
            {{-- request btn --}}
            <div class="flex"  id="propertyActions">
                <button class="w-1/2 font-Inter text-md request-btn p-2 border-t border-l border-r font-bold" data-id="tour-form" >Schedule visit</button>
                <button class="w-1/2 font-sans text-md request-btn p-2 border-b" data-id="info-form" >Request Info</button>
            </div>
            {{-- schedule form --}}
            <div class="shadow-lg pt-4 border-b border-l border-r p-4 request-form" id="tour-form">
                @include('web.contact.schedule',['origin' => 'property page'])
            </div>
            {{-- request info form --}}
            <div class="shadow-lg border-b border-l border-r pt-4 p-2 hidden request-form" id="info-form">
                @include('web.contact.request_info',['origin' => 'property page'])
            </div>
            
        </div>

    </div>

</div>

{{-- modal --}}
@include('web.inc.installments_modal')

<!-- property images Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="propertyImages" tabindex="-1" aria-labelledby="propertyImagesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable relative w-auto pointer-events-none">
        <div
            class="modal-content border border-gray-500 shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-500 rounded-t-md">
                <h5 class="text-xl font-medium leading-normal text-gray-800" id="propertyImagesLabel">
                    {{ $property->name }}
                </h5>
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">

                {{-- main image --}}
                <div class="p-2">
                    <img class="w-full shadow-md"
                        src="{{ asset('storage/'.$property->image) }}" alt="{{ $property->name.$property->image }}">
                </div>

                {{-- other images --}}
                @if (count($property->images) > 0)
                    @foreach ($property->images as $image)
                        <div class="p-2">
                            <img class="w-full shadow-md"
                                src="{{ asset('storage/'.$image->path) }}" alt="{{ $property->name.$image->path }}">
                        </div>     
                    @endforeach  
                @endif
                
                {{-- msg --}}
                <div class="text-center my-4">
                    No more images
                </div>
            </div>
            <div
                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-500 rounded-b-md">
                <button type="button" class="btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('webjs')

<script>
    let principle = "{{ $property->price }}"
</script>
<script src="{{ asset('js/modules/instalmentsCalculator.js') }}"></script>
<script src="{{ asset('js/modules/contactForm.js') }}"></script>
@endsection