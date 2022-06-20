@extends('layouts.admin', [
    'title' => 'Users',
    'breadcrumbs' => [
        'User & security' => 'user_security/manager',
    ],
])


@section('admincss')
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
@endsection

@section('page')

    {{-- user data table inc --}}
    @include('admin.user_security.inc.users')

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
