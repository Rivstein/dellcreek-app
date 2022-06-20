@extends('layouts.admin', [
    'title' => 'Our team',
    'breadcrumbs' => [
        'CRM' => 'content_manager'
    ]
])

@section('admincss')
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
@endsection

@section('page')
    {{-- create our team web section btn --}}
    <div>
        <a href="{{ url('content_manager_team_create') }}" class="btn-success">
            <span>Create Team Member</span>
            <i class="fa fa-plus ml-3"></i>
        </a>
    </div>
    {{-- our team web section data table --}}
    <div class="my-5 bg-white border border-gray-500 rounded shadow-lg p-2">
        <table id="myTable" class="display cell-border compact">
            <thead>
                <th>Name</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Whatsapp</th>
                <th>Email</th>
                <th>Created by</th>
                <th>Updated by</th>
                <th>Action</th>
            </thead>
            <tbody class="text-sm">
                @if (count($team) > 0)
                    @foreach ($team as $team_member)
                        <tr>
                            <td>{{ $team_member->name }}</td>
                            <td>{{ $team_member->position }}</td>
                            <td>{{ $team_member->phone_number }}</td>
                            <td>{{ $team_member->whatsapp_number }}</td>
                            <td>{{ $team_member->email }}</td>
                            <td>
                                <a href="#" class="text-blue-800 underline">
                                    {{ $team_member->createdBy->name }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="text-blue-800 underline">
                                    {{ $team_member->updatedBy->name }}
                                </a>
                            </td>
                            <td class="shadow-inner items-center">
                                <a href="{{ url('team_manager/'.$team_member->id) }}">
                                    <i class="fa-solid fa-screwdriver-wrench p-2 text-green-500"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    no data
                @endif
            </tbody>
        </table>
    </div>

@endsection

@section('adminjs')
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                ordering: false
            });
        });
    </script>
@endsection
