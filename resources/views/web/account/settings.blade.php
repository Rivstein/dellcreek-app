@extends('layouts.web')

@section('page')
    <div class="mx-auto md:w-1/2 py-8 px-3">
        {{-- user details --}}
        <div class="accordion w-full" id="accordionExample5">
            <div class="accordion-item bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingOne5">
                    <button
                        class="
              accordion-button
              relative
              flex
              items-center
              w-full
              py-4
              px-5
              text-base text-gray-800 text-left
              bg-white
              border-0
              rounded-none
              transition
              focus:outline-none
            "
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true"
                        aria-controls="collapseOne5">
                        Change Personal Details
                    </button>
                </h2>
                <div id="collapseOne5" class="accordion-collapse collapse show" aria-labelledby="headingOne5">
                    <div class="accordion-body py-4 px-5">

                        {{-- details form --}}
                        <form action="{{ route('settings_edit', ['id' => $user->id, 'type' => 'details']) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="my-4">
                                <label for="name">Username</label>
                                <input type="text" name="name" placeholder="{{ $user->name }}"
                                    value="{{ old('name') ?? ($user->name ?? '') }}"
                                    class="form-input @error('name') form-invalid @enderror">
                                @error('name')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="my-4">
                                <label for="name">Phone Number</label>
                                <input type="text" name="phone_number" placeholder="{{ $user->phone_number }}"
                                    value="{{ old('phone_number') ?? ($user->phone_number ?? '') }}"
                                    class="form-input @error('phone_number') form-invalid @enderror">
                                @error('phone_number')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex md:justify-end mt-3 items-center">
                                <button class="btn-primary w-full md:w-1/4 justify-center" type="submit">
                                    Save changes
                                    <i class="fa-solid fa-floppy-disk ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- newsletter subscription --}}
            <div class="accordion-item bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingTwo5">
                    <button
                        class="
                    accordion-button
                    collapsed
                    relative
                    flex
                    items-center
                    w-full
                    py-4
                    px-5
                    text-base text-gray-800 text-left
                    bg-white
                    border-0
                    rounded-none
                    transition
                    focus:outline-none
                  "
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="false"
                        aria-controls="collapseTwo5">
                        Newsletter Subscription
                    </button>
                </h2>
                <div id="collapseTwo5" class="accordion-collapse collapse" aria-labelledby="headingTwo5">

                    {{-- subscription form --}}
                    <div class="accordion-body py-4 px-5">
                        <form action="{{ route('settings_edit', ['id' => $user->id, 'type' => 'subscription']) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="my-2 p-2">
                                <label for="" class="block">Subscribe to our Newsletters</label>
                                <label for="isSubscribed" class="p-4 block">
                                    <input type="radio" name="isSubscribed" class="mr-2" id="isSubscribed"
                                        value="1" 
                                        {{-- check if subscribrion is true --}}
                                        @if (old('isSubscribed') === 1)
                                            checked
                                        @elseif($user->isSubscribed)
                                            checked
                                        @endif
                                        >Yes
                                </label>
                                <label for="isNotSubscribed" class="p-4 block">
                                    <input type="radio" name="isSubscribed" class="mr-2" id="isNotSubscribed"
                                        value="0" 
                                        {{-- check if subscribrion is not true --}}
                                        @if (old('isSubscribed') === 0)
                                            checked
                                        @elseif(!$user->isSubscribed)
                                            checked
                                        @endif
                                        >No
                                </label>
                            </div>
                            <div class=" md:flex md:justify-end my-3 items-center">
                                <button class="btn-primary w-full md:w-1/4 justify-center" type="submit">
                                    Save changes
                                    <i class="fa-solid fa-floppy-disk ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
