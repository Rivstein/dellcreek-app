{{-- success message --}}
@if (session()->has('success-message'))
<div class="alert flex mb-1 justify-between items-center bg-green-200 p-4 text-base text-green-700 w-full alert-dismissible fade show"
    role="alert">
    <div class="flex items-center">
        {{-- icon --}}
        <i class="fa-solid fa-circle-check"></i>
        {{-- message --}}
        <div class="mx-3">
            {{ session()->get('success-message') }}
        </div>
    </div>
    {{-- close btn --}}
    <button type="button" data-bs-dismiss="alert" aria-label="Close">
        <i class="fa fa-times"></i>
    </button>
</div>
@endif

{{-- danger message --}}
@if (session()->has('danger-message'))
<div class="alert flex mb-1 justify-between items-center bg-red-200 p-4 text-base text-red-700 w-full alert-dismissible fade show"
    role="alert">
    <div class="flex items-center">
        {{-- icon --}}
        <i class="fa-solid fa-circle-exclamation"></i>
        {{-- message --}}
        <div class="mx-3">
            {{ session()->get('danger-message') }}
        </div>
    </div>
    {{-- close btn --}}
    <button type="button" data-bs-dismiss="alert" aria-label="Close">
        <i class="fa fa-times"></i>
    </button>
</div>
@endif
{{-- error messages --}}
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert flex mb-1 justify-between items-center bg-red-200 p-4 text-base text-red-700 w-full alert-dismissible fade show"
    role="alert">
    <div class="flex items-center">
        {{-- icon --}}
        <i class="fa-solid fa-circle-exclamation"></i>
        {{-- message --}}
        <div class="mx-3">
            {{ $error }}
        </div>
    </div>
    {{-- close btn --}}
    <button type="button" data-bs-dismiss="alert" aria-label="Close">
        <i class="fa fa-times"></i>
    </button>
</div>
@endforeach
@endif

{{-- info message --}}
@if (session()->has('info-message'))
<div class="alert flex mb-1 justify-between items-center bg-blue-200 p-4 text-base text-blue-700 w-full alert-dismissible fade show"
    role="alert">
    <div class="flex items-center">
        {{-- icon --}}
        <i class="fa-solid fa-circle-info"></i>
        {{-- message --}}
        <div class="mx-3">
            {{ session()->get('info-message') }}
        </div>
    </div>
    {{-- close btn --}}
    <button type="button" data-bs-dismiss="alert" aria-label="Close">
        <i class="fa fa-times"></i>
    </button>
</div>
@endif

{{-- warning message --}}
@if (session()->has('warning-message'))
<div class="alert flex mb-1 justify-between items-center bg-yellow-200 p-4 text-base text-yellow-700 w-full alert-dismissible fade show"
    role="alert">
    <div class="flex items-center">
        {{-- icon --}}
        <i class="fa-solid fa-triangle-exclamation"></i>
        {{-- message --}}
        <div class="mx-3">
            {{ session()->get('warning-message') }}
        </div>
    </div>
    {{-- close btn --}}
    <button type="button" data-bs-dismiss="alert" aria-label="Close">
        <i class="fa fa-times"></i>
    </button>
</div>
@endif