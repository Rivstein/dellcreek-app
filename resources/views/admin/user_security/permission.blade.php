@extends('layouts.admin',[
    'title' => 'Permission : '.$permission->name,
    'breadcrumbs' => [
        'User & security' => 'user_security/manager',
        'Permissions' => 'access_control/manager/permission'
    ]
])

@section('page')
    {{-- toolbar --}}
    <div class="flex items-center justify-between">
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
                    Edit permission
                </button>
                {{-- permissions --}}
                <button data-bs-toggle="modal" data-bs-target="#deleteRolePermissionModal" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                    <i class="fa-solid fa-trash text-red-600 pr-1"></i>
                    Delete permission
                </button>
            </div>
        </div>
    </div>

    {{-- attach detach permission roles --}}
    <div class="shadow-lg flex border my-4 border-gray-500 bg-white">
        {{-- details - left --}}
        <div class="w-1/4 border-r border-gray-500 p-2 text-sm">
            {{-- name --}}
            <div class="mx-3">
                <div class="mb-2">
                    <div class="font-bold">Display name</div>
                    <div class="p-1">
                        {{ $permission->display_name }}
                    </div>
                </div>
                <div class="mb-2">
                    <div class="font-bold">Name</div>
                    <div class="p-1">
                        {{ $permission->name }}
                    </div>
                </div>
                <div class="mb-2">
                    <div class="font-bold">Description</div>
                    <div class="p-1">
                        {{ $permission->description }}
                    </div>
                </div>
            </div>
        </div>
        {{-- right --}}
        <div class="w-full">
            {{-- save changes btn --}}
            <div class="flex justify-between items-center p-2 border-b border-b-gray-500">
                <h1 class="font-bold">Attached roles</h1>
                <button type="submit" form="roles-form" class="btn-success">
                    Save changes
                </button>
            </div>
            {{-- roles --}}
            <div class="p-4">
                @if (count($permission->roles) > 0)
                    <table class="border border-gray-500 w-full">
                        <thead class="text-left text-lg border-b-2 border-b-gray-800">
                            <th class="border border-gray-500 p-2  w-10"></th>
                            <th class="border border-gray-500 p-2">Name</th>
                            <th class="border border-gray-500 p-2">Users</th>
                        </thead>
                        <tbody>
                            <form action="{{ route('access_control.permission_roles',['id'=>$permission->id]) }}" id="roles-form" method="POST">
                                @csrf
                                @foreach ($permission->roles as $role)
                                    <tr class="@if($loop->even) bg-gray-100 @endif text-sm hover:bg-gray-200">
                                        <td class="border border-gray-500 p-1 text-center">
                                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" checked>
                                        </td>
                                        <td class="border border-gray-500 p-1">
                                            <a href="{{ url('access_control/role/'.$role->id) }}" class="text-blue-800 font-semibold hover:underline">
                                                {{ $role->display_name }}
                                                ( {{ $role->name }} )
                                            </a>
                                        </td>
                                        <td class="border border-gray-500 p-1">
                                            <a href="#" class="text-blue-800 font-semibold hover:underline">
                                                (2)Users
                                            </a>
                                        </td>
                                    </tr>    
                                @endforeach     
                            </form>    
                        </tbody>
                    </table>
                @else
                    <div class="bg-green-300 rounded p-3">
                        <b>{{ $permission->display_name }}</b> permission 
                        has no roles attached to it.
                    </div>
                @endif
            </div>
            {{-- save changes btn --}}
            <div class="flex justify-end p-2 border-t border-t-gray-500">
                <button type="submit" form="roles-form" class="btn-success">
                    Save changes
                </button>
            </div>
        </div>
    </div>


    {{-- modal --}}
    @include('admin.user_security.inc.access_control_form', ['value' => $permission, 'type' => 'permission'])

    {{-- delete modal --}}
    @include('admin.inc.deletemodal',[
        'id' => 'deleteRolePermissionModal',
        'item' => 'permission',
        'url' => url('access_control/delete/permission/'.$permission->id)
    ])

@endsection