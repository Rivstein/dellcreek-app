
{{-- ui --}}
@if (isset($breadcrumbs))
    <div class="flex items-center">
        {{-- breadcrumbs --}}
        @foreach ($breadcrumbs as $name => $url)
            <a href="{{ url($url) }}" class="text-blue-800 hover:underline text-sm font-semibold px-1">
                {{ $name }}
            </a>
            <span>/</span>    
        @endforeach
        
        {{-- current page --}}
        @if (isset($title))
            <div class="text-sm font-semibold px-1">
                {{ $title }}
            </div>    
        @endif
    </div>
@endif