@extends('layouts.admin', [
    'title' => 'Edit ' . $user->name,
    'breadcrumbs' => [
        'Users' => 'users',
    ],
])

@section('page')

    {{-- action btn --}}
    <div class=" flex justify-end py-2">
        <button class="btn-primary btn-sm mr-2" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Action
            <i class="fa-solid fa-caret-down pl-2"></i>
        </button>
        {{-- action dropdown --}}
        <div class="dropdown-menu absolute bg-white rounded border border-gray-500 min-w-max z-50 hidden"
            aria-labelledby="userDropdown">
            {{-- delete --}}
            <a href="#" class="block border-b py-2 px-4 text-xs hover:underline" data-bs-toggle="modal"
                data-bs-target="#deleteUserModal">
                <i class="fa-solid fa-trash text-red-600"></i>
                Delete {{ $user->name }}
            </a>
        </div>
    </div>

    {{-- edit user section--}}
    <div class="bg-white border mb-10 border-gray-500">
        {{-- include create user form --}}
        @include('admin.user_security.inc.crud_user', [
            'action' => route('edit_user', ['id' => $user->id]),
            'edit' => true,
        ])

        {{-- delete modal --}}
        @include('admin.inc.deletemodal', [
            'id' => 'deleteUserModal',
            'item' => 'user',
            'url' => route('delete_user', ['id' => $user->id]),
        ])

    </div>
@endsection
