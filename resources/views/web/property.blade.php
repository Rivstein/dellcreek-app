@extends('layouts.web')

@section('page')

<div class="md:mx-auto md:w-3/4 md:p-4">

    {{-- images --}}
    <div class="relative">
        <a href="#" class="flex md:h-80 h-64" data-bs-toggle="modal" data-bs-target="#propertyImages">
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
        {{-- for sale badge --}}
        <div class="absolute top-0 left-0 m-4">
            <span class="bg-white shadow-lg rounded px-2 py-1 font-semibold text-xs">
                FOR SALE
            </span>
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
                </div>
                {{-- price --}}
                <div class="md:w-1/2 md:text-right">
                    <h2 class="text-3xl mb-2 font-bold">
                        Ksh {{ number_format($property->price) }}
                    </h2>
                    {{-- deposite --}}
                    <div class="text-sm">
                        Min. Deposite
                        <span class="font-semibold">
                            Ksh {{ number_format($property->price*0.1) }}
                        </span>
                    </div>
                    {{-- check installments --}}
                    <button type="button" class="btn-warning text-lg my-3 text-md md:float-right" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Calculate Installments
                    </button>
                </div>
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
        <div class="md:w-1/3 w-full bg-gray-300 p-2">

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
                    Modal title
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
@endsection