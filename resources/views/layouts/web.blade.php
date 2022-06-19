@extends('layouts.app')


@section('appcss')
    @yield('webcss')
@endsection


@section('body')

    {{-- topnav --}}
    @include('web.inc.topnav')

    {{-- alert messages --}}
    @include('alerts.messages')

    {{-- offcanvas mobile nav --}}
    @include('web.inc.mobilenav')

    @yield('page')

    {{-- footer --}}
    @include('web.inc.footer')

    {{-- auth modals --}}
    @include('auth.modals')

@endsection

@section('appjs')
    @yield('webjs')
@endsection