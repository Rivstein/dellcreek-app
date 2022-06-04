@extends('layouts.web')

@section('page')

    <div class="md:mx-auto md:w-3/4 md:p-4">

        {{-- image --}}
        <div>
            <img class="md:rounded-md h-64 md:h-80 w-full object-cover shadow-md"
                src="{{ asset('storage/'.$property->image) }}" 
                alt="{{ $property->name.$property->image }}">
        </div>

        {{-- main row --}}
        <div class="flex flex-wrap my-5">

            {{-- information --}}
            <div class="md:w-2/3 p-2 px-4 md:px-2">

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
                        <button type="button"
                            class="btn-warning text-lg my-3 text-md md:float-right"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
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

            {{-- actions --}}
            <div class="md:w-1/3 bg-gray-300 p-2">

            </div>

        </div>

    </div>

    {{-- modal --}}
    @include('web.inc.installmentsModal')
    
@endsection

@section('webjs')
    <script>
        let principle = "{{ $property->price }}"
    </script>
    <script src="{{ asset('js/modules/instalmentsCalculator.js') }}"></script>
@endsection