@extends('layouts.app')


@section('appcss')
    @yield('webcss')
@endsection


@section('body')

    {{-- topnav --}}
    @include('web.inc.topnav')

    {{-- offcanvas mobile nav --}}
    @include('web.inc.mobilenav')

    @yield('page')



    {{-- footer --}}
    @include('web.inc.footer')

@endsection

@section('appjs')
    @yield('webjs')
@endsection