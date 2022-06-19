@extends('layouts.app')

@section('body')
<div class="mx-auto bg-white md:w-1/3 md:mt-3 md:shadow-lg rounded p-3 md:border border-gray-200">
    
    {{-- register form --}}
    @include('auth.inc.register_form')
    
</div>
@endsection
