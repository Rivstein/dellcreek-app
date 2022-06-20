@extends('layouts.admin',['title' => 'Users & security'])

@section('page')

{{-- toolbar --}}
<div class="flex justify-between items-center">
    {{-- left --}}
    <div class="flex items-center"> 
        {{-- users --}}
        <button class="btn-secondary btn-sm mr-2" id="countyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-users pr-2"></i>
                Users
            <i class="fa-solid fa-caret-down pl-2"></i>
        </button>
        <div class="dropdown-menu absolute bg-white rounded border border-gray-500 min-w-max z-50 hidden"
            aria-labelledby="countyDropdown">
            {{-- roles --}}
            <a href="{{ url('users') }}" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                <i class="fa-solid fa-users text-blue-800 pr-1"></i>
                All users
            </a>
            {{-- permissions --}}
            <a href="{{ url('create') }}" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                <i class="fa-solid fa-user-plus text-blue-800 pr-1"></i>
                Create user
            </a>
        </div>
        {{-- access control --}}
        <button class="btn-secondary btn-sm mr-2" id="countyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-lock pr-2"></i>
                Access control
            <i class="fa-solid fa-caret-down pl-2"></i>
        </button>
        <div class="dropdown-menu absolute bg-white rounded border border-gray-500 min-w-max z-50 hidden"
            aria-labelledby="countyDropdown">
            {{-- roles --}}
            <a href="{{ url('access_control/manager/role') }}" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                <i class="fa-solid fa-user-tag text-blue-800 pr-1"></i>
                User roles
            </a>
            {{-- permissions --}}
            <a href="{{ url('access_control/manager/permission') }}" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                <i class="fa-solid fa-key text-blue-800 pr-1"></i>
                System permissions
            </a>
        </div>
    </div>
    {{-- right --}}
    <div>

    </div>
</div>

{{-- Developement alert --}}
@include('admin.alert.dev')
    
@endsection