@extends('layouts.admin',[
    'title' => ucfirst($type).'s manager',
    'breadcrumbs' => [
        'User & security' => 'user_security/manager'
    ]
])

@section('admincss')
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
@endsection

@section('page')

{{-- toolbar --}}
<div class="flex items-center justify-between">
    {{-- left --}}
    <div class="flex items-center">
        {{-- create --}}
        <button class="btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#accessControlModal">
            Create {{ $type }}
            <i class="fa fa-plus ml-2"></i>
        </button>
    </div>
</div>

{{-- table --}}
<div class="my-5 bg-white border border-gray-500 rounded shadow-lg p-2">
    <table id="myTable" class="display cell-border compact">
        <thead>
            <th>Display name</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @if ($items)
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->display_name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ url('access_control/'.$type.'/'.$item->id) }}" class="btn-primary btn-sm">
                                Manage
                                <i class="fa-solid fa-screwdriver-wrench pl-2"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach    
            @else
                no {{ $type }}
            @endif
        </tbody>
    </table>    
</div>

{{-- modal --}}
@include('admin.user_security.inc.access_control_form')
    
@endsection

@section('adminjs')
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                ordering:  false
            });
        });
    </script>
@endsection