{{-- declare nav links to be looped through --}}
@php
    $mobileMenuItems = [
        ['name' => 'Home', 'url' => '/', 'icon' => 'fa-house'],
        ['name' => 'Properties', 'url' => 'properties/all', 'icon' => 'fa-landmark'],
        ['name' => 'About', 'url' => 'about_us', 'icon' => 'fa-circle-info'],
        ['name' => 'Contact', 'url' => 'contact', 'icon' => 'fa-phone'],
        // ['name' => 'Sell', 'url' => 'sell', 'icon' => 'fa-money-bill-wave'],
    ]
@endphp

{{-- offcanvas mobile nav --}}
<div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 right-0 border-none w-96" tabindex="-1" id="offcanvasMobileNav" aria-labelledby="offcanvasMobileNavLabel">
    <div class="offcanvas-header flex items-center justify-between p-4 border-b border-b-gray-500 bg-slate-700 text-gray-100 shadow-md">
        <h5 class="offcanvas-title mb-0 text-xl" id="offcanvasMobileNavLabel">
            Main menu
        </h5>
        <button type="button" class="text-2xl box-content p-2 -my-5 -mr-2 text-gray-100 border-none rounded-none  focus:shadow-none focus:outline-none focus:opacity-100 hover:text-gray-50 hover:opacity-75 hover:no-underline" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
    </div>

    <div class="offcanvas-body flex-grow overflow-y-auto bg-slate-100 py-4">
        <ul>

            @foreach ($mobileMenuItems as $item)
                <li class="border-b border-b-gray-500">
                    <a href=" {{ url($item['url']) }} " class="text-lg block px-2 py-4">
                        <i class="fa-solid {{$item['icon']}}  px-4 text-slate-900"></i> {{$item['name']}}
                    </a>
                </li>
            @endforeach
            
        </ul>
    </div>
</div>