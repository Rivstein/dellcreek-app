@extends('layouts.admin',['title'=>'Properties manager'])

@section('admincss')
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
@endsection

@section('page')

    {{-- create property btn --}}
    <div>
        <a href="{{ url('admin/properties/create') }}" class="btn-success">
            <span>Create Property</span>
            <i class="fa fa-plus ml-3"></i>
        </a>
    </div>

    {{-- table --}}
    @include('admin.properties.inc.propertiesTable')
    

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