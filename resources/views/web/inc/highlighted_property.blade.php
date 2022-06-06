@if ($highlighted)
<div
    class="transition ease-in-out duration-700 hover:scale-105 mx-2 bg-white rounded-lg drop-shadow-xl hover:drop-shadow-2xl">
    {{-- image --}}
    <a href="{{ url('properties/property/'.$highlighted->id) }}">
        <img src="{{ asset('storage/'.$highlighted->image) }}" class="w-full min-w-full h-64 md:h-96 object-cover rounded-t-lg"
            alt="">
    </a>
    {{-- text --}}
    <div class="py-3 px-6 flex items-center justify-between font-semibold">
        {{-- property details --}}
        <div>
            <div class="text-2xl mb-2">{{ $highlighted->name }}</div>
            <div class="bg-yellow-400 px-2 rounded inline-block">
                Ksh {{ number_format($highlighted->price) }}
            </div>
        </div>
        {{-- description modal btn --}}
        <button type="button" title="Learn more" class="text-3xl shadow-md hover:text-yellow-400" data-bs-toggle="modal"
            data-bs-target="#highlightedProperty">
            <i class="fa-solid fa-circle-info"></i>
        </button>
    </div>
</div>
@else

No property

@endif



