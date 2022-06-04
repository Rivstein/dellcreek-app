@extends('layouts.admin',[
    'title'=>'Edit property',
    'breadcrumbs' => [
        $property->name => 'admin/properties/property/'.$property->id
    ]
])

@section('page')

    {{-- form --}}
    @include('admin.properties.inc.crud_form',[
        'action' => route('admin.propery.update',['id' => $property->id]),
        'edit' => true
    ])
    
@endsection

@section('adminjs')
    @include('admin.properties.inc.crud_js')
@endsection