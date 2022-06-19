{{-- php --}}
@php
$menu_items = [
    'about_us' => 'About',
    'properties/all' => 'Properties',
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
            <div class="-mt-1 font-bold text-sm">Developers Ltd</div>
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
        <div class="hidden lg:flex w-64 items-center ">
            @include('web.inc.search_bar')
        </div>
        {{-- auth --}}
        <div class="dropdown relative ml-8 md:mr-0 mr-8">
            <button class="text-2xl" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-circle-user"></i>
            </button>
            {{-- menu --}}
            <ul class="dropdown-menu
            min-w-max
            absolute
            hidden
            bg-white
            text-base
            z-50
            float-left
            py-2
            list-none
            text-left
            rounded-lg
            shadow-lg
            mt-1
            hidden
            m-0
            bg-clip-padding
            border-none" aria-labelledby="dropdownMenuButton1">
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">
                            <i class="fa-solid fa-arrow-right-to-bracket pr-2"></i>
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">
                            <i class="fa-solid fa-user-plus pr-2"></i>
                            Register
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('profile') }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">
                            <i class="fa-solid fa-user pr-2"></i>
                            My Account
                        </a>
                    </li>
                    @if (auth()->user()->isAbleTo('access-admin'))
                        <li>
                            <a href="{{ url('dashboard') }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">
                                <i class="fa-solid fa-gauge-high pr-2"></i>
                                Dashboard
                            </a>
                        </li>   
                    @endif
                    <li>
                        <a href="{{ url('/logout') }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">
                            <i class="fa-solid fa-power-off pr-2"></i>
                            Logout
                        </a>
                    </li>   
                @endguest
            </ul>
        </div>
        {{-- mobile nav icon --}}
        <button class="md:hidden" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileNav" aria-controls="offcanvasMobileNav">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
</div>

{{-- clear fix --}}
<div class="mb-16"></div>

