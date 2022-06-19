
{{-- ui --}}
<div>
    <a href="{{ url('properties/property/'.$property->id) }}" class="relative">
        <img src="{{ asset('storage/'.$property->image) }}" class="min-w-full h-72 object-cover rounded-tl-md rounded-tr-md shadow-md" alt="property">
        {{-- location --}}
        <div class="absolute top-0 left-0 m-2 text-sm bg-white rounded px-4 shadow-lg font-bold">
            <i class="fa-solid fa-location-dot pr-2"></i>
            {{ $property->county }}
        </div>
        {{-- title --}}
        @if ($property->hasTitle)
            <div class="absolute top-0 right-0 bg-green-300 shadow-lg text-xs font-bold m-2 rounded px-2">
                <i class="fa-solid fa-certificate text-red-600"></i>
                Title deed
            </div>    
        @endif
        {{-- price --}}
        <div class="absolute bottom-20 right-0 m-2 bg-yellow-400 rounded px-4 shadow-lg font-bold">
            Ksh {{ number_format($property->price) }}
        </div>
        {{-- details card --}}
        <div class="bg-white border rounded-bl-md rounded-br-md border-gray-500 shadow-lg p-2">
            <div class="font-bold">{{ $property->name }}</div>
            <div class="text-sm">{{ $property->dimensions }}</div>
        </div>
    </a>
</div>
