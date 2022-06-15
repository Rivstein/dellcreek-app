@extends('layouts.admin',[
    'title' => 'Role : '.$role->name,
    'breadcrumbs' => [
        'User & security' => 'user_security/manager',
        'Roles' => 'access_control/manager/role'
    ]
])

@section('page')
    {{-- toolbar --}}
    <div class="flex items-center justify-between my-3">
        {{-- left --}}
        <div>

        </div>
        {{-- right --}}
        <div>
            {{-- actions --}}
            <button class="btn-secondary btn-sm mr-2" id="countyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
                <i class="fa-solid fa-caret-down pl-2"></i>
            </button>
            <div class="dropdown-menu absolute bg-white rounded border border-gray-500 min-w-max z-50 hidden"
                aria-labelledby="countyDropdown">
                {{-- roles --}}
                <button data-bs-toggle="modal" data-bs-target="#accessControlModal" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                    <i class="fa-solid fa-edit text-blue-800 pr-1"></i>
                    Edit role
                </button>
                {{-- permissions --}}
                <button data-bs-toggle="modal" data-bs-target="#deleteRolePermissionModal" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                    <i class="fa-solid fa-trash text-red-600 pr-1"></i>
                    Delete role
                </button>
            </div>
        </div>
    </div>

    {{-- attach detach role permissions --}}
    <div class="shadow-lg flex border border-gray-500 bg-white">
        {{-- details - left --}}
        <div class="w-1/4 border-r border-gray-500 p-2 text-sm">
            {{-- name --}}
            <div class="mx-3">
                <div class="mb-2">
                    <div class="font-bold">Display name</div>
                    <div class="p-1">
                        {{ $role->display_name }}
                    </div>
                </div>
                <div class="mb-2">
                    <div class="font-bold">Name</div>
                    <div class="p-1">
                        {{ $role->name }}
                    </div>
                </div>
                <div class="mb-2">
                    <div class="font-bold">Description</div>
                    <div class="p-1">
                        {{ $role->description }}
                    </div>
                </div>
            </div>
            {{-- users --}}
            <div class="m-3">
                <a href="#" class="text-blue-800 font-semibold hover:underline">
                    Users (23)
                </a>
            </div>
        </div>
        {{-- right --}}
        <div class="w-full">
            {{-- save changes btn --}}
            <div class="flex justify-between items-center p-2 border-b border-b-gray-500">
                <h1 class="font-bold">System permissions</h1>
                <button type="submit" form="permissions-form" class="btn-success">
                    Save changes
                </button>
            </div>
            {{-- permissions --}}
            <div class="p-4">
                @if (count($permissions) > 0)
                    <form action="{{ route('access_control.role_permissions',['id'=>$role->id]) }}" id="permissions-form" method="POST" class="flex flex-wrap">
                        @csrf

                        @foreach ($permissions as $permission)
                            <div class="p-2 w-1/4">
                                <label for="{{ $permission->id }}">
                                    <input name="permissions[]" type="checkbox" 
                                        id="{{ $permission->id }}" 
                                        value="{{ $permission->name }}"
                                        @if($role->hasPermission($permission->name))  
                                            checked
                                        @endif>
                                    <span class="pl-2">{{ $permission->display_name }}</span>
                                </label>
                            </div>
                        @endforeach  

                    </form>
                @else
                    <div class="bg-green-300 rounded p-3">
                        No permissions available
                    </div>
                @endif
            </div>
            {{-- save changes btn --}}
            <div class="flex justify-end p-2 border-t border-t-gray-500">
                <button type="submit" form="permissions-form" class="btn-success">
                    Save changes
                </button>
            </div>
        </div>
    </div>


    {{-- modal --}}
    @include('admin.user_security.inc.access_control_form', ['value' => $role, 'type' => 'role'])

    {{-- delete modal --}}
    @include('admin.inc.deletemodal',[
        'id' => 'deleteRolePermissionModal',
        'item' => 'role',
        'url' => url('access_control/delete/role/'.$role->id)
    ])

@endsection