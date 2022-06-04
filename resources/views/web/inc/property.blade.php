
{{-- ui --}}
<div>
    <a href="{{ url('properties/property/'.$property->id) }}" class="relative">
        <img src="{{ asset('storage/'.$property->image) }}" class="min-w-full h-72 object-cover rounded-md shadow-md" alt="property">
        {{-- location --}}
        <div class="absolute top-0 left-0 m-2 text-sm bg-white rounded px-4 shadow-lg font-bold">
            <i class="fa-solid fa-location-dot pr-2"></i>
            {{ $property->county }}
        </div>
        {{-- size --}}
        <div class="absolute top-0 right-0 m-2 text-sm bg-white rounded px-4 shadow-lg font-bold">
            {{ $property->dimensions }}
        </div>
        {{-- price --}}
        <div class="absolute bottom-0 right-0 m-2 bg-yellow-400 rounded px-4 shadow-lg font-bold">
            Ksh {{ number_format($property->price) }}
        </div>
    </a>
</div>
