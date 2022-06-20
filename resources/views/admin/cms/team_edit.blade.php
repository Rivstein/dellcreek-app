@extends('layouts.admin', [
    'title' => $team->name,
    'breadcrumbs' => [
        'Team' => 'content_manager_team',
    ],
])

@section('page')
    {{-- action btn --}}
    <div class=" flex justify-end py-2">
        <button class="btn-primary btn-sm mr-2" id="countyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Action
            <i class="fa-solid fa-caret-down pl-2"></i>
        </button>
        {{-- action dropdown --}}
        <div class="dropdown-menu absolute bg-white rounded border border-gray-500 min-w-max z-50 hidden"
            aria-labelledby="countyDropdown">
            {{-- delete --}}
            <a href="" class="block border-b py-2 px-4 text-xs hover:underline" data-bs-toggle="modal" data-bs-target="#deleteMemberModal">
                <i class="fa-solid fa-trash text-red-600"></i>
                Delete {{ $team->name }}
            </a>
        </div>
    </div>


    {{-- edit table with relavant details --}}
    <div class="bg-white border mb-10 border-gray-500">
        <form action="{{ route('team_update', ['id' => $team->id] ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{-- team member details --}}
            <div class="p-2 border-b border-b-gray-500">
                <h1 class="text-lg font-bold mb-3">Edit member details</h1>
                <div class="flex flex-wrap items-start">
                    {{-- name --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Name</label>
                        <input type="text" class="form-input" placeholder="{{ $team->name }}" name="name"
                            value="{{ $team->name }}">
                    </div>
                    {{-- position --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Position</label>
                        <input type="text" class="form-input" placeholder="{{ $team->position }}" name="position"
                            value="{{ $team->position }}">
                    </div>
                    {{-- email --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Email</label>
                        <input type="text" class="form-input" placeholder="{{ $team->email }}" name="email"
                            value="{{ $team->email }}">
                    </div>
                    {{-- phone number --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Phone number</label>
                        <input type="text" class="form-input" placeholder="{{ $team->phone_number }}"
                            name="phone_number" value="{{ $team->phone_number }}">
                    </div>
                    {{-- whatsapp number --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Whatsapp number</label>
                        <input type="text" class="form-input" placeholder="{{ $team->whatsapp_number }}"
                            name="whatsapp_number" value="{{ $team->whatsapp_number }}">
                    </div>
                </div>
            </div>
            {{-- team member image --}}
            <div class="p-2 border-b border-b-gray-500">
                <h1 class="text-lg font-bold mb-3">Change photo</h1>
                <div class="">
                    {{-- photo --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Cover photo</label>
                        <input type="file" name="photo">
                    </div>
                </div>
            </div>

            {{-- submit btn --}}
            <div class="flex justify-end p-5">
                <button class="btn-success" type="submit">
                    <span>Update</span>
                    <i class="fa fa-check ml-3"></i>
                </button>
            </div>
        </form>
    </div>

    {{-- delete modal --}}
    @include('admin.inc.deletemodal', [
        'id' => 'deleteMemberModal',
        'item' => 'team member',
        'url' => route('team_delete',['id'=> $team->id]),
    ])
@endsection
