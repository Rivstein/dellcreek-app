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
                <th>Phone number</th>
                <th>Whatsapp number</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if (count($team) > 0)
                    @foreach ($team as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->position }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->whatsapp_number }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="shadow-inner items-center">
                                <a href="{{ url('team_manager/'.$item->id) }}">
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
