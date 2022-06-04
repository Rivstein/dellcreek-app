@extends('layouts.admin',[
    'title'=>'Create property',
    'breadcrumbs' => [
        'Properties manager' => 'admin/properties/manager'
    ]
])

@section('page')

    {{-- form --}}
    @include('admin.properties.inc.crud_form',[
        'action'=>route('admin.propery.store')
    ])
    
@endsection

@section('adminjs')
    <script src="{{ asset('js/modules/createproperty.js') }}"></script>
    @include('admin.properties.inc.crud_js')
@endsection