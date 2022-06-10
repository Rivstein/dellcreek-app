@extends('layouts.web')

@section('webcss')
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
@endsection


@section('page')

<div>
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
                                class="bg-yellow-600 hover:bg-yellow-700 hover:shadow-md mr-3 rounded-md text-white font-bold shadow px-8 py-2">
                                Discover
                            </a>
                            {{-- item --}}
                            <a href="#"
                                class="bg-white hover:shadow-md hover:shadow-yellow-700 ml-3 border-solid border border-yellow-600 rounded-md font-bold shadow px-8 py-2">
                                Sell Property
                            </a>
                        </div>
                    </div>

                    {{-- highlighted property image --}}
                    <div class="md:w-1/2 md:pl-10">
                        @include('web.inc.highlighted_property')
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
            <a href="#" class="bg-yellow-600 hover:bg-yellow-700 hover:shadow-lg py-4 px-8 shadow text-white rounded font-bold">
                View more properties
            </a>
        </div>
    </div>

    {{-- browse by county --}}
    @include('web.inc.browse_by_county')

    {{-- subscribe --}}
    @include('web.inc.subscribe', ['origin' => 'landing page'])
</div>


<!-- highlighted Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="highlightedProperty" tabindex="-1" aria-labelledby="highlightedPropertyLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl font-bold leading-normal text-gray-800" id="highlightedPropertyLabel">
                    Highlighted Property
                </h5>
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- body --}}
            <div class="modal-body relative p-4">
                
                @if ($description)
                    {{ $description }}
                @else
                    Default description
                @endif

            </div>
            <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                
                @isset($highlighted)
                   <a href="{{ url('properties/property/'.$highlighted->id)}}" class="btn-warning">
                        View property
                        <i class="pl-2 fa fa-arrow-right"></i>
                    </a> 
                @endisset
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('webjs')
    <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/modules/countyCarousel.js') }}"></script>
@endsection