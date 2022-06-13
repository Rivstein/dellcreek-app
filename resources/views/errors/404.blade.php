@extends('layouts.app')

@section('body')

{{-- logo --}}
<div class="fixed p-4">
    <a href="{{ url('/') }}">
        <img src="{{ asset('img/logo.png') }}" class="w-20" alt="">
    </a>
</div>

<div class="h-screen w-full flex items-center">
    {{-- message --}}
    <div class="md:w-1/2 w-full px-4">
        <div class="mb-4 text-indigo-700 font-semibold">404 ERROR</div>
        <h1 class="md:text-5xl text-4xl font-bold mb-1">
            Page not found
        </h1>
        <div class="text-lg text-gray-600 mb-4">
            Sorry, we could not find the page you're looking for.
        </div>
        <a href="{{ url('/') }}" class="mb-3 text-indigo-700 font-semibold">
            Go back home
            <i class="fa fa-arrow-right pl-2"></i>
        </a>
    </div>
    {{-- image --}}
    <div class="hidden md:block md:w-1/2 h-full">
        <img src="{{ asset('img/errors/404.jpg') }}" class="h-full" alt="">
    </div>
</div>

{{-- support link --}}
<div class="fixed bottom-0 p-4">
    <a href="#" class="text-indigo-700 font-semibold underline">
        Contact support
    </a>
</div>
    
@endsection