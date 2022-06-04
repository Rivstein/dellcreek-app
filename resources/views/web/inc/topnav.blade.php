{{-- php --}}
@php
    $menu_items = [
        'about_us' => 'About',
        'properties' => 'Properties',
        'sell_property' => 'Sell',
        'contact' => 'Contact',
    ]
@endphp

{{-- component ui --}}
<div class="bg-white z-50 shadow px-4 py-2 flex justify-between items-center fixed top-0 right-0 left-0">
    {{-- logo --}}
    <a href="{{ url('/') }}" class="flex items-center">
        <img src="{{ asset('img/logo.png') }}" class="w-14" alt="dellcreek logo">
        <div class="text-xl ml-3 font-bold">
            <div>Dellcreek</div>
            <div class="-mt-1 font-mono text-sm">Properties Ltd</div>
        </div>
    </a>
    {{-- main menu --}}
    <ul class="hidden md:flex items-center">

        @foreach ($menu_items as $key => $item)
            <li class="mx-4 font-bold text-lg">
                <a href="{{ url($key) }}">
                    {{ $item }}
                </a>
            </li>    
        @endforeach
        
    </ul>
    {{-- search, auth & mobile icon--}}
    <div class="flex items-center">
        {{-- search --}}
        <div class="hidden lg:flex w-64 items-center border border-gray-500 bg-gray-50 hover:bg-gray-100 px-4 py-2 rounded shadow focus-within:shadow-lg">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="ml-4" placeholder="Search properties">
        </div>
        {{-- auth --}}
        <div class="ml-8 md:mr-0 mr-8">
            <button class="text-2xl">
                <i class="fa-solid fa-circle-user"></i>
            </button>
        </div>
        {{-- mobile nav icon --}}
        <button class="md:hidden">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
</div>

{{-- clear fix --}}
<div class="mt-16"></div>