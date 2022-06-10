
{{-- browse by county --}}
<div class="my-10">
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
    <div id="counties-carousel" class="owl-carousel px-2 my-14">
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
        @else
            
        @endif
    </div>
</div>