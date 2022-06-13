
{{-- browse by county --}}
<div class="my-10 mb-20">
    {{-- title --}}
    <div class="flex justify-center text-3xl font-bold">
        <div class="mr-1">Browse by</div>
        <div class="dropdown relative">
            <button class="text-blue-800 hover:underline" id="countyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <span>county</span>
                <i class="fa-solid fa-caret-down text-2xl"></i>
            </button>
            <ul class="dropdown-menu absolute bg-white pb-4 rounded px-4 border border-gray-500 min-w-max list-none z-50 hidden" aria-labelledby="countyDropdown">
                @if ($counties)
                    @foreach ($counties as $county)
                        <li>
                            <a href="#" class="text-sm font-semibold hover:text-blue-800">
                                {{ $county }}
                            </a>
                        </li>    
                    @endforeach    
                @else
                    <li class="text-sm">No counties</li>
                @endif
            </ul>
        </div>
    </div>

    {{-- counties --}}
    <div class="h-72 relative w-full my-10">
        {{-- carousel --}}
        <div id="counties-carousel" class="owl-carousel px-2">
            @if ($counties)
                @foreach ($counties as $county)
                    <div class="rounded-md shadow-md h-72" style="background-image: url({{ asset('img/land/land1.jpg') }})">
                        <a href="#">
                            <div class="relative rounded-md bg-black/50 h-full w-full">
                                <h1 class="text-xl p-4 font-bold text-white">{{ $county }}</h1>
                                <button class="absolute bottom-0 left-0 btn-light py-1 m-4 text-sm">
                                    <span>View properties</span>
                                    <i class="fa fa-arrow-right pl-1"></i>
                                </button>
                            </div>    
                        </a>
                    </div>    
                @endforeach
                {{-- didn't find what you are looking for --}}
                <div class="rounded-md shadow-md border border-gray-500 h-72">
                    <div class="flex flex-wrap justify-center mt-20">
                        <div class="text-lg w-full font-semibold mb-2">
                            <div class="w-2/3 text-center mx-auto">
                             Didn't find what your looking for?   
                            </div>
                        </div>
                        <a href="#" class="btn-primary">
                            Get help
                        </a>
                    </div>
                </div>
            @else
                
            @endif
        </div>
        {{-- carousel navigation --}}
        <button class="absolute top-28 z-40 left-0 text-center prev-county rounded-full h-8 w-8 shadow-lg bg-yellow-400" type="button">
            <i class="fa fa-angle-left"></i>
        </button>
        <button class="absolute top-28 z-40 right-0 text-center next-county rounded-full h-8 w-8 shadow-lg bg-yellow-400" type="button">
            <i class="fa fa-angle-right"></i>
        </button>
    </div>
    
</div>