<!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="highlightProperty" tabindex="-1" aria-labelledby="highlightPropertyLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border border-gray-500 shadow-lg relative flex flex-col w-full pointer-events-auto bg-gray-100 bg-clip-padding rounded-md outline-none text-current">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-500 rounded-t-md">
                <h5 class="text-xl font-bold leading-normal text-gray-800" id="highlightPropertyLabel">
                    Highlight property
                </h5>
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- body --}}
            <div class="modal-body relative p-4">

                @if ($highlighted)
                    <div class="bg-green-200 px-2 py-1 text-sm rounded mb-3">
                        Edit <span class="font-bold">{{ $property->name }}</span>
                        highlights, NOTE this property is currently the highlited property on the home page.
                    </div>
                @else
                    <div class="bg-blue-200 px-2 py-1 text-sm rounded mb-3">
                        Add <span class="font-bold">{{ $property->name }}</span>
                        to home page highlighted property.
                    </div>    
                @endif
                

                <form action="{{ route('highlight_property') }}" id="highlight-form" method="POST">
                    @csrf
                    @if ($highlighted)
                        @method('PATCH')
                        <input hidden name="id" value="{{ $highlighted->id }}" type="number">
                    @else
                        {{-- property_id --}}
                        <input hidden value="{{ $property->id }}" type="number" name="property_id">
                    @endif
                    {{-- description --}}
                    <div>
                        <label>Property highlights</label>
                        <textarea class="form-input" required name="description" rows="5" placeholder="Describe why the property is highlighted">{{ $highlighted->description ?? '' }}</textarea>
                    </div>
                    
                </form>

            </div>
            <div
                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-500 rounded-b-md">
                @if ($highlighted)
                    <button form="delete-highligted" class="btn-danger mx-3">
                        <i class="fa fa-ban pr-2"></i>
                        Remove
                    </button>
                    {{-- delete highligted --}}
                    <form id="delete-highligted" action="{{ route('remove_highlighted',['id'=>$highlighted->id]) }}" method="POST">
                        @csrf
                    </form>    
                @endif
                

                <button class="btn-warning" form="highlight-form">
                    @if ($highlighted)
                        Update highlights
                    @else
                        Highlight property
                    @endif
                    <i class="pl-2 fa fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>