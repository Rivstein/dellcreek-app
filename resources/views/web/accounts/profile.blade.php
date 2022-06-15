@extends('layouts.web')

@section('page')

    <div class="md:mx-auto md:w-3/4 py-4 px-2 md:p-4">
        <div class="md:flex">
            {{--left--}}
            <div class="md:p-2 md:w-1/3">
                {{-- user info --}}
                <div class="border border-gray-500 shadow-lg p-2 text-sm font-bold flex justify-between items-center">
                    <div>
                        <div>Brian Ngugi</div>
                        <div>brian@gmail.com </div>
                        <div>0796458762</div>
                    </div>
                    <div>
                        <a href="#" class="btn-primary">
                            <i class="fa fa-gear pr-2"></i> Settings
                        </a>
                    </div>
                </div>

                {{-- recommended properties btn --}}
                <div class="my-4">
                    <button class="btn-warning w-full justify-center">
                        <i class="fa fa-star text-green-500 pr-2"></i>
                        Property Recommendations
                    </button>
                </div>

                {{-- properties notification btn --}}
                <div class="my-4">
                    -- NOTIFICATIONS --
                </div>
            </div>

            {{-- right --}}
            <div class="md:p-2 md:w-2/3">
                {{-- property watch list --}}
                <div class="border border-gray-500">
                    <div class="p-2 font-bold text-lg border-b border-gray-500">Property Watch List</div>

                    {{-- watch list --}}
                    @for ($i = 1; $i < 6; $i++)
                        <div class="px-2 py-4 shadow-md m-2">
                            @if ($i == 3)
                                <div class="text-right font-bold text-red-500 text-sm p-1">
                                    UNLISTED
                                </div>
                            @endif
                            {{-- watch property item --}}
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <img src="{{ asset('img/land/land'.$i.'.jpg') }}" alt="image" class="w-1/5">
                                    <div class="text-sm font-bold w-4/5 ml-4">
                                        <div>Karen Hills</div>
                                        <div>50 * 100</div>
                                        <div>80,0000 ksh</div>
                                    </div>
                                </div>
                                <div class="">
                                    <button class="btn-secondary btn-sm mr-2" id="countyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu absolute bg-white rounded border border-gray-500 min-w-max z-50 hidden"
                                        aria-labelledby="countyDropdown">
                                        {{-- view property --}}
                                        <a href="#" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                                            <i class="fa-solid fa-eye text-blue-800 pr-1"></i>
                                            View property
                                        </a>
                                        {{-- shedule tour --}}
                                        <a href="#" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                                            <i class="fa-solid fa-clock text-blue-800 pr-1"></i>
                                            Shedule tour
                                        </a>
                                        {{-- request info --}}
                                        <a href="#" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                                            <i class="fa-solid fa-message text-blue-800 pr-1"></i>
                                            Request info
                                        </a>
                                        {{-- remove from watchlist --}}
                                        <a href="#" class="block border-b py-2 px-4 text-sm hover:bg-gray-100">
                                            <i class="fa-solid fa-trash text-red-600 pr-1"></i>
                                            Remove from watchlist
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    @endfor

                </div>
            </div>
        </div>
    </div>

@endsection