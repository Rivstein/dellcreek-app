<div class="bg-white border mb-10 border-gray-500">
    <form action="{{ $action ?? '' }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($edit))
            @method('PATCH')
        @endif

        {{-- Details --}}
        <div class="p-2 border-b border-b-gray-500">
            <h1 class="text-lg font-bold mb-3">Property details</h1>
            <div class="flex flex-wrap items-start">

                {{-- name --}}
                <div class="p-3 md:w-1/3 w-full">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') ?? $property->name ?? '' }}"
                        class="form-input @error('name') form-invalid @enderror" placeholder="Property's name">
                    @error('name')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- dimensions --}}
                <div class="p-3 md:w-1/3 w-full">
                    <label>Dimensions</label>
                    <input type="text" name="dimensions" value="{{ old('dimensions') ?? $property->dimensions ?? '' }}"
                        class="form-input @error('dimensions') form-invalid @enderror"
                        placeholder="Property's size and dimensions">
                    @error('dimensions')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- map --}}
                <div class="p-3 md:w-1/3 w-full">
                    <label>Map</label>
                    <div class="flex items-center">
                        <input id="map-input-form" name="map" type="text"
                            value="{{ old('map') ?? $property->map ?? '' }}"
                            class="form-input @error('map') form-invalid @enderror"
                            placeholder="Paste embed html from google maps">
                        <button class="px-4 hover:text-blue-800">
                            <i class="fa-solid fa-circle-question"></i>
                        </button>
                    </div>
                    @error('map')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- county --}}
                <div class="p-3 md:w-1/3 w-full">
                    <label>County</label>
                    <select name="county" 
                        class="form-input select-county @error('county') form-invalid @enderror">
                        <option value="" disabled selected>Select county</option>
                    </select>
                    @error('county')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- sub county --}}
                <div class="p-3 md:w-1/3 w-full">
                    <label class="w-fit inline-block">Sub county</label>
                    <select name="sub_county"
                        class="form-input select-subcounty @error('sub_county') form-invalid @enderror">
                        <option value="" disabled selected>Select subcounty</option>
                    </select>
                    @error('sub_county')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- location : local info --}}
                <div class="p-3 md:w-1/3 w-full">
                    <label>Location information</label>
                    <textarea  name="location" rows="3" placeholder="Enter important towns, infrustructure and land marks found within the properties location"
                        class="form-input @error('location') form-invalid @enderror">{{ old('location') ?? $property->location ?? '' }}</textarea>
                    @error('location')
                        <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        {{-- description --}}
        <div class="p-2 border-b border-b-gray-500">
            <h1 class="text-lg font-bold mb-3">Property description</h1>
            @error('description')
            <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
            <textarea name="description"
                id="descriptionEditor">{{ old('description') ?? $property->description ?? '' }}</textarea>
        </div>

        {{-- price and payment --}}
        <div class="p-2 border-b border-b-gray-500">
            <h1 class="text-lg font-bold mb-3">Property price</h1>
            <div class="flex flex-wrap md:flex-nowrap items-center">
                {{-- price --}}
                <div class="m-3 md:w-1/3 w-full">
                    <label>Price</label>
                    <input name="price" value="{{ old('price') ?? $property->price ?? '' }}" type="number"
                        class="form-input @error('price') form-invalid @enderror" placeholder="Property's price">
                    @error('price')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Images --}}
        @if (!isset($edit))
            <div class="p-2 border-b border-b-gray-500">
                <h1 class="text-lg font-bold mb-3">Property images</h1>
                <div class="flex items-center">
                    <div>
                        @error('image')
                        <div class="text-xs text-red-500">
                            Main image is required
                        </div>
                        @enderror
                        <button type="button" id="main-image-btn" class="m-3 btn-primary">
                            Add property's main image
                            <i class="fa-solid fa-image pl-3"></i>
                        </button>
                        <input hidden type="file" value="{{ old('image') }}" name="image" id="main-image">
                    </div>
                    <button type="button" class="btn-primary m-3 hidden" id="add-image-btn">
                        Add another image
                        <i class="fa-solid fa-images pl-3"></i>
                    </button>
                </div>
                {{-- uploaded images --}}
                <div id="uploaded-images"></div>
            </div>    
        @endif
        
        {{-- submit btn --}}
        <div class="flex justify-end p-5">
            <button class="btn-success">
                <span>Create</span>
                <i class="fa fa-check ml-3"></i>
            </button>
        </div>
    </form>
</div>