@extends('layouts.app')

@section('body')
{{-- alert messages --}}
@include('alerts.messages')

<div class="mx-auto bg-white md:w-1/3 md:mt-20 md:shadow-lg rounded p-3 md:border border-gray-200">
    
    {{-- login form --}}
    @include('auth.inc.login_form')    
    
</div>
@endsection
