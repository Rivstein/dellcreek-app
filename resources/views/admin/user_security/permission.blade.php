@extends('layouts.admin',[
    'title' => 'Permission - '.$value->name,
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


    {{-- modal --}}
    @include('admin.user_security.inc.access_control_form')

    {{-- delete modal --}}
    @include('admin.inc.deletemodal',[
        'id' => 'deleteRolePermissionModal',
        'item' => $type,
        'url' => url('access_control/delete/'.$type.'/'.$value->id)
    ])

@endsection