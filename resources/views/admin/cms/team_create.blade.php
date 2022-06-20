@extends('layouts.admin',[
    'title' => 'Create team member',
    'breadcrumbs' => [
        'Our team' => 'content_manager_team'
    ]
])

@section('page')
    {{-- create team section --}}
    <div class="bg-white border mb-10 border-gray-500">

        <form action="{{ route('team_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            {{-- team member details --}}
            <div class="p-2 border-b border-b-gray-500">
                <h1 class="text-lg font-bold mb-3">Member details</h1>
                <div class="flex flex-wrap items-start">
                    {{-- name --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Name</label>
                        <input type="text" class="form-input" placeholder="enter team member name" name="name" required>
                    </div>
                    {{-- position --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Position</label>
                        <input type="text" class="form-input" placeholder="enter team member position" name="position" required>
                    </div>
                    {{-- email --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Email</label>
                        <input type="text" class="form-input" placeholder="enter team member email" name="email" required>
                    </div>
                    {{-- phone number --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Phone number</label>
                        <input type="text" class="form-input" placeholder="enter phone number" name="phone_number" required>
                    </div>
                    {{-- whatsapp number --}}
                    <div class="p-3 md:w-1/3 w-full">
                        <label for="">Whatsapp number</label>
                        <input type="text" class="form-input" placeholder="enter whatsapp number" name="whatsapp_number">
                    </div>
                </div>
            </div>
            {{-- team member image --}}
             <div class="p-2 border-b border-b-gray-500">
                <h1 class="text-lg font-bold mb-3">Member photo</h1>
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
                <button class="btn-success">
                    <span>Create</span>
                    <i class="fa fa-check ml-3"></i>
                </button>
            </div>
        </form>
    </div>
@endsection