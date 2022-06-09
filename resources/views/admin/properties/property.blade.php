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
            {{-- images --}}
            <div class="dropdown relative mr-2">
                <button class="
                        dropdown-toggle
                        btn-secondary py-1
                        transition
                        duration-150
                        ease-in-out
                        flex
                        items-center
                        whitespace-nowrap
                    " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    
                    <i class="fa fa-images pr-2"></i>
                    Images

                    
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                        </path>
                    </svg>
                </button>
                <ul class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#uploadImage" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                            <i class="fa fa-upload pr-2 text-blue-800"></i>
                            Upload image 
                        </a>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#replaceMainImage" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                            <i class="fa fa-arrows-rotate pr-2 text-blue-800"></i>
                            Replace main image 
                        </a>
                    </li>
                </ul>
            </div>
            {{-- highlight --}}
            @if ($highlighted)
            <button class="mx-2 btn-warning shadow-lg py-1" title="Property highlighted" data-bs-toggle="modal"
                data-bs-target="#highlightProperty">
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
            {{-- actions --}}
            <div class="dropdown relative">
                <button class="
                        dropdown-toggle
                        btn-secondary py-1
                        transition
                        duration-150
                        ease-in-out
                        flex
                        items-center
                        whitespace-nowrap
                    " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                        </path>
                    </svg>
                </button>
                <ul class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a href="{{ url('admin/properties/edit/'.$property->id) }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                            <i class="fa fa-edit pr-2 text-blue-800"></i>
                            Edit property details
                        </a>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deletePropertyModal" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                            <i class="fa fa-trash pr-2 text-red-800"></i>
                            Delete property
                        </a>
                    </li>
                </ul>
            </div>
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

                            @if (count($property->images))

                            <div class="flex w-full flex-wrap">
                                @foreach ($property->images as $image)
                                <div class="md:w-1/4 w-full p-2 mb-3">
                                    <img class="block" src="{{ asset('storage/'.$image->path) }}" alt="">
                                    <div class="flex">
                                        {{-- delete--}}
                                        <button class="delete-img-btn">
                                            <i class="fa fa-trash text-red-500"></i>
                                        </button>
                                        {{-- confirm delete --}}
                                        <form
                                            action="{{ route('admin.propery.delete_image',['id'=>$image->id, 'property_id'=>$property->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="text-xs delete-img-actions ml-2 hidden hover:underline text-red-800">
                                                Delete image
                                            </button>
                                        </form>
                                        {{-- cancel delete --}}
                                        <button
                                            class="text-xs delete-img-actions hidden cancel-img-delete ml-2 hover:underline text-blue-800">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            @else

                            <div class="text-center">
                                <i class="fa fa-images text-3xl"></i>
                                <div>
                                    No images
                                </div>
                            </div>

                            @endif

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
@include('admin.properties.inc.property_modals')

@endsection

{{-- js --}}
@section('adminjs')
<script>
    let $delete_img_btn = $('.delete-img-btn')
        let $cancel_img_delete = $('.cancel-img-delete')

        $delete_img_btn.click(function(){
            $('.delete-img-actions').hide()
            $(this).parent().find('.delete-img-actions').show()
        })

        $cancel_img_delete.click(function(){
            $('.delete-img-actions').hide()
        })
</script>
@endsection