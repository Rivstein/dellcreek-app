@extends('layouts.app')


@section('appcss')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('admincss')
@endsection


@section('body')

    {{-- fixed body height --}}
    <div class="h-screen">

        {{-- top nav --}}
        @include('admin.inc.topnav')

        {{-- main body --}}
        <div class="flex main-body">

            {{-- sidenav --}}
            @include('admin.inc.sidenav')

            {{-- page --}}
            <div class="w-full bg-gray-50 overflow-y-auto py-2 px-4">

                {{-- page header --}}
                <div class="flex justify-between items-center mb-5">
                    {{-- page title --}}
                    <h1 class="font-bold text-2xl">
                        {{ $title ?? '-add page title-' }}
                    </h1>
                    {{-- breadcrumbs --}}
                    <div>
                        @include('admin.inc.breadcrumbs')
                    </div>
                </div>

                {{-- alert messages --}}
                @include('alerts.messages')

                {{-- yeild page --}}
                @yield('page')    
            </div>

        </div>

    </div>
    

@endsection

@section('appjs')
    @yield('adminjs')
@endsection