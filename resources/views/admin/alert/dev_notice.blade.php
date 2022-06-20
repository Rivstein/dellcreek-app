{{-- dev notice alert --}}
<div class="bg-yellow-400 p-2 rounded-lg shadow-lg my-2">
    <h4 class="text-lg font-medium leading-tight mb-2">
        <i class="fa-solid fa-code text-red-600"></i>
        Development Notice
    </h4>
    {{-- msg --}}
    <div class="text-sm font-bold px-7">
        {{ $devMessage }}
    </div>
</div>