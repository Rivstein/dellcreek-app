@extends('layouts.app')


@section('appcss')
    @yield('webcss')
@endsection


@section('body')

    {{-- topnav --}}
    @include('web.inc.topnav')

    @yield('page')

@endsection

@section('appjs')
    @yield('webjs')
@endsection