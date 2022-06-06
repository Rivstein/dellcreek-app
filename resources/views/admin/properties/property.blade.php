@extends('layouts.admin',[
'title' => $property->name,
'breadcrumbs' => [
'Properties manager' => 'admin/properties/manager'
]
])

@section('page')

{{-- main --}}
<div class="admin-card">

    {{-- toolbar --}}
    <div class="p-4 flex justify-between border-b border-b-gray-500">
        {{-- left --}}
        <div class="flex items-center">
            {{-- edit --}}
            <a href="{{ url('admin/properties/edit/'.$property->id) }}" class="btn-primary py-1 mx-2">
                <i class="fa fa-edit pr-2"></i>
                Edit
            </a>
            {{-- highlight --}}
            @if ($highlighted)
                <button class="mx-2 btn-warning shadow-lg py-1" title="Property highlighted" data-bs-toggle="modal" data-bs-target="#highlightProperty">
                    <i class="fa fa-star text-green-600 pr-2"></i>
                    Highlighted
                </button>
            @else
                <button class="mx-2 btn-secondary py-1" data-bs-toggle="modal" data-bs-target="#highlightProperty">
                    <i class="fa fa-rocket text-yellow-400 pr-2"></i>
                    Highlight
                </button>    
            @endif
            
        </div>
        {{-- right --}}
        <div class="flex items-center">
            <button type="button" class="btn-danger py-1 mx-2"
            data-bs-toggle="modal" data-bs-target="#deletePropertyModal"
            >
                <i class="fa fa-trash pr-2"></i>
               Delete
            </button>
        </div>
    </div>

    {{-- property --}}
    <div class="flex flex-wrap">
        {{-- details --}}
        <div class="p-4 md:w-1/4 border-r border-r-gray-500">
            {{-- name --}}
            <h3 class="text-lg font-bold mb-3">
                {{ $property->name }}
            </h3>
            {{-- image --}}
            <div class="mb-3">
                <img src="{{ asset('storage/'.$property->image) }}" class="shadow-md" alt="">
            </div>
            {{-- price --}}
            <div class="mt-3 font-bold">
                Ksh {{ number_format($property->price) }}
            </div>
            {{-- price --}}
            <div class="mt-1 font-bold">
                Size: {{ $property->dimensions }}
            </div>
            {{-- location --}}
            <div class="mt-1 font-bold">
                <h1 class="text-lg mt-2 underline">Local information</h1>
                <div>
                    {{ $property->county }},
                    {{ $property->sub_county }}    
                </div>
                <div class="mt-2">
                    {{ $property->location }}
                </div>
            </div>
        </div>

        {{-- description and images --}}
        <div class="md:w-3/4 p-4">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item bg-white border border-gray-500">
                    <h2 class="accordion-header mb-0" id="headingOne">
                        <button class="
                        accordion-button
                        relative
                        flex
                        items-center
                        w-full
                        py-4
                        px-5
                        text-base text-gray-800 text-left font-bold
                        bg-gray-200
                        border-0
                        rounded-none
                        transition
                        focus:outline-none
                        " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            Property Description
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            {!! $property->description !!}
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-white border border-gray-500">
                    <h2 class="accordion-header mb-0" id="headingTwo">
                        <button class="
                        accordion-button
                        collapsed
                        relative
                        flex
                        items-center
                        w-full
                        py-4
                        px-5
                        text-base text-gray-800 text-left font-bold
                        bg-gray-200
                        border-0
                        rounded-none
                        transition
                        focus:outline-none
                        " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            Property Images
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            Images...
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        
    </div>
</div>

{{-- delete modal --}}
@include('admin.inc.deletemodal',[
    'id' => 'deletePropertyModal',
    'item' => 'property',
    'url' => url('admin/properties/delete/'.$property->id)
])

{{-- highlight modal --}}
@include('admin.properties.inc.highlight_modal')

@endsection