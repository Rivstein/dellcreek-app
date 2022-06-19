@extends('layouts.web')

@section('page')

<div class="mx-auto md:w-1/2 py-8 px-3">

    @if ($type == 'schedule')
        <h1 class="font-bold text-lg mb-3">
            Schedule visit
        </h1>
        {{-- schedule form --}}
        @include('web.contact.schedule',['origin' => 'account profile'])    
    @else
        <h1 class="font-bold text-lg mb-3">
            Request info
        </h1>
        {{-- request info form --}}
        @include('web.contact.request_info',['origin' => 'account profile'])   
    @endif
    
</div>

    
@endsection