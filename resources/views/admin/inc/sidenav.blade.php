{{-- php --}}
@php
    $menu_items = [
        ['name'=> 'Dashboard', 'url'=>'dashboard', 'icon' => 'fa-gauge-high'],
        ['name'=> 'Properties', 'url'=>'admin/properties/manager', 'icon' => 'fa-rectangle-list'],
        ['name'=> 'CRM', 'url'=>'index', 'icon' => 'fa-headset'],
        ['name'=> 'CMS', 'url'=>'content_manager', 'icon' => 'fa-bars-progress'],
        ['name'=> 'Users & security', 'url'=>'user_security/manager', 'icon' => 'fa-user-lock']
    ];
@endphp

{{-- ui --}}
<div class="admin-sidenav w-1/5 overflow-y-auto border-r border-r-gray-500 shadow">

    @foreach ($menu_items as $item)
        {{-- menu item --}}
        <a href="{{ url($item['url']) }}" class="border-b border-b-gray-500 hover:bg-gray-400 py-3 px-4 flex items-center">
            <i class="fa-solid {{ $item['icon'] }} mr-4"></i>
            <span class="font-bold">{{ $item['name'] }}</span>
        </a>    
    @endforeach
    
</div>