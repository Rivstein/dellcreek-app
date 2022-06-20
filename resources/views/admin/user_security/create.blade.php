@extends('layouts.admin', [
    'title' => 'Create User',
    'breadcrumbs' => [
        'Users' => 'users',
    ],
])

@section('page')
    {{-- create user --}}
    <div class="bg-white border mb-10 border-gray-500">
        
        {{-- include create user form --}}
        @include('admin.user_security.inc.crud_user',[
            'action'=>route('create_user')
        ])
        
    </div>
@endsection
