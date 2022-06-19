@extends('layouts.admin ', ['title' => 'Content managment system'])

@section('page')
    {{-- toolbar --}}
    <div class="flex justify-between items-center my-2">
        {{-- left content manager buttons --}}
        <div class="flex items-center">
            {{-- targets btn --}}
            <button class="btn-secondary btn-sm mr-2" id="countyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-file-lines pr-2"></i>
                Content Targets
                <i class="fa-solid fa-caret-down pl-2"></i>
            </button>
            <div class="dropdown-menu absolute bg-white rounded border border-gray-500 min-w-max z-50 hidden"
                aria-labelledby="countyDropdown">
                {{-- targets item --}}
                @if (count($targetItems) > 0)
                    @foreach ($targetItems as $item)
                        <a href="{{ url('content_manager/'.$item) }}" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                            <i class="fa-solid fa-pager pr-2"></i>
                            {{ $item }} Page
                        </a>
                    @endforeach
                @else
                    no data
                @endif
            </div>
            {{-- staff btn --}}
            <a href="{{ 'content_manager_team' }}" class="btn-secondary btn-sm ml-2">
                <i class="fa-solid fa-user-group pr-2"></i>
                Our Team
            </a>
        </div>

        {{-- right content manager buttons --}}
        <div class="flex items-center">
            {{-- actions --}}
            <button class="btn-primary btn-sm mr-2" id="countyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
                <i class="fa-solid fa-caret-down pl-2"></i>
            </button>
            <div class="dropdown-menu absolute bg-white rounded border border-gray-500 min-w-max z-50 hidden"
                aria-labelledby="countyDropdown">
                {{-- setup --}}
                <a href="{{ url('content_manager_setup') }}"
                    class="block border-b py-2 px-4 text-sm hover:bg-gray-100 text-semibold">
                    <i class="fa-solid fa-screwdriver-wrench pr-1"></i>
                    Run Setup
                </a>
            </div>
        </div>

    </div>
@endsection
