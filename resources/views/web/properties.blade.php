@extends('layouts.app')

{{-- counties --}}
@php
$counties_list = App\Models\Property::select('county')->groupBy('county')
->orderByRaw('COUNT(*) DESC')
->limit(47)
->get();
$counties = [];

foreach ($counties_list as $county_name) {
array_push($counties, $county_name->county);
}
@endphp

@section('body')
{{-- topnav --}}
@include('web.inc.topnav')

{{-- alert messages --}}
@include('alerts.messages')

{{-- offcanvas mobile nav --}}
@include('web.inc.mobilenav')

{{-- main --}}
<div class="mx-auto md:w-11/12 w-full p-4">
    {{-- top --}}
    <div class="flex justify-between items-center border-b border-b-gray-500 shadow-lg py-2">
        {{-- breadcrumbs --}}
        <div class="text-xs">
            <a href="{{ url('properties/all') }}" class="hover:underline font-bold">
                All properties
            </a>
            @if(isset($county) && $county)
                / {{ $county }} county
            @endif
        </div>
        {{-- filters and sort --}}
        <div class="flex items-center">
            {{-- sort --}}
            @if ($sort)
                <div>
                    <button class="btn-light rounded-none btn-sm mr-2 py-2" id="countyDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="pr-2 hidden md:inline">Sort</span>
                        <i class="fa-solid fa-arrow-down-wide-short"></i>
                    </button>
                    <div class="dropdown-menu absolute bg-white rounded border border-gray-500 min-w-max z-50 hidden"
                        aria-labelledby="countyDropdown">
                        {{-- new to old --}}
                        <a href="{{ route('properties.sort',['type'=>'new_to_old','county' => isset($county) ? $county : null]) }}" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                            New to old
                        </a>
                        {{-- old to new --}}
                        <a href="{{ route('properties.sort',['type'=>'old_to_new','county' => isset($county) ? $county : null]) }}" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                            Old to new
                        </a>
                        {{-- price high to low --}}
                        <a href="{{ route('properties.sort',['type'=>'high_to_low','county' => isset($county) ? $county : null]) }}" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                            Price: High to low
                        </a>
                        {{-- price low to high --}}
                        <a href="{{ route('properties.sort',['type'=>'low_to_high','county' => isset($county) ? $county : null]) }}" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                            Price: Low to high
                        </a>
                    </div>
                </div>    
            @endif
            {{-- filter --}}
            <div>
                <button class="btn-primary rounded-none btn-sm mr-2 py-2" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasFilters" aria-expanded="false">
                    <span class="pr-2 hidden md:inline">Filter</span>
                    <i class="fa-solid fa-filter"></i>
                </button>
            </div>
        </div>
    </div>
    {{-- search bar --}}
    <div class="mx-auto md:w-1/2 w-full p-2 py-4">
        @include('web.inc.search_bar')
    </div>
    {{-- properties --}}
    <div class="w-full mx-0">
        {{-- title --}}
        <h1 class="text-center text-3xl pt-10 mb-10 font-bold">
            Properties for sale
            @if(isset($county) && $county)
                in {{ $county }} county
            @endif
        </h1>

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
            no properties
        @endif
        
        {{-- pagination --}}
        <div class="mt-6 mb-10 md:py-4">
            {{ $properties->links() }}
        </div>
        
    </div>
</div>

{{-- filter offcanvas --}}
<div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 right-0 border-none w-96"
    tabindex="-1" id="offcanvasFilters" aria-labelledby="offcanvasFiltersLabel">
    <div
        class="offcanvas-header flex items-center justify-between p-4 border-b border-b-gray-500 bg-slate-700 text-gray-100 shadow-md">
        <h5 class="offcanvas-title mb-0 text-xl" id="offcanvasFiltersLabel">
            Filter
        </h5>
        <button type="button"
            class="text-2xl box-content p-2 -my-5 -mr-2 text-gray-100 border-none rounded-none  focus:shadow-none focus:outline-none focus:opacity-100 hover:text-gray-50 hover:opacity-75 hover:no-underline"
            data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
    </div>

    <div class="offcanvas-body flex-grow border-l border-l-gray-500 shadow-lg overflow-y-auto py-4">
        <form action="{{ route('properties.filter') }}" method="GET">
            @csrf

            {{-- price --}}
            <div class="p-3">
                <label>Price</label>
                <div class="flex">
                    <input type="number" name="min" placeholder="min price" value="0" class="form-input mr-3">
                    <input type="number" name="max" placeholder="max price" class="form-input">
                </div>
            </div>

            {{-- title --}}
            <div class="p-3">
                <label>Title deed</label>
                <div class="flex">
                    <label for="hasTitle" class="mr-4">
                        <input type="radio" id="hasTitle" name="withTitle" value="1">
                        <span class="pl-1">With title</span>
                    </label>
                    <label for="hasNoTitle">
                        <input type="radio" id="hasNoTitle" name="withTitle" value="0" checked>
                        <span class="pl-1">All</span>
                    </label>
                </div>
            </div>

            {{-- counties --}}
            <div class="p-3">
                <label>Counties</label>
                @if (count($counties) > 0)
                    <div class="flex flex-wrap">
                        @foreach ($counties as $county)
                            <label for="{{ $county }}" class="p-2 w-1/2">
                                <input type="checkbox" id="{{ $county }}" name="counties[]" value="{{ $county }}">
                                <span class="pl-1">{{ $county }}</span>
                            </label>
                        @endforeach
                    </div>
                @else
                No counties
                @endif
            </div>

            {{-- submit --}}
            <button type="submit" class="btn-warning mx-4 mt-4">
                Filter
            </button>
        </form>
    </div>
</div>

{{-- auth modals --}}
@include('auth.modals')

@endsection