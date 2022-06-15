@extends('layouts.web')

@section('page')
    <div class="md:mx-auto md:w-3/4 my-20 px-2 md:p-4 ">
        <div class=" md:flex">
            {{-- left --}}
            <div class=" bg-slate-800 md:w-1/3 p-4 text-white shadow-lg relative pb-10">
                {{-- contact information --}}
                <div class="font-bold text-xl">Contact Information</div>
                <div class="py-4">
                    {{-- customer support --}}
                    <div class="my-4">
                        <h5 class="text-sm font-bold text-blue-200">Customer Support</h5>
                        {{-- support phone number --}}
                        <div class=" py-2">
                            <span><i class=" fa fa-phone text-yellow-400 pr-4"></i></span>
                            <span class="text-sm font-bold">+254 715731111</span>
                        </div>

                        {{-- support email address --}}
                        <div class=" py-2">
                            <span><i class=" fa-solid fa-envelope text-yellow-400 pr-4"></i></span>
                            <span class="text-sm font-bold">contact@dellcreek.co.ke</span>
                        </div>
                    </div>

                    {{-- location and address --}}
                    <div class="my-4">
                        <h5 class="text-sm font-bold text-blue-200 mt-2">Head office location</h5>
                        {{-- location --}}
                        <div class=" py-2 flex ">
                            <i class=" fa-solid fa-location-pin text-yellow-400 pr-4"></i>
                            <p class="text-sm font-bold">Dellcreek Developers ltd, Krishna Centre, </p>
                        </div>
                        {{-- location --}}
                        <div class=" py-2 flex ">
                            <i class=" fa-solid fa-map-pin text-yellow-400 pr-4"></i>
                            <p class="text-sm font-bold">Westlands, Nairobi.</p>
                        </div>
                    </div>
                </div>
                {{-- social media links --}}
                <div class="absolute bottom-0 right-0 left-0 ">
                    <div class="flex items-center text-sm m-4">
                        <a href="#" class="mr-4">
                            <i class="fa-brands fa-facebook text-2xl text-yellow-500"></i>
                        </a>
                        <a href="#" class="mr-4">
                            <i class="fa-brands fa-twitter text-2xl text-yellow-500"></i>
                        </a>
                        <a href="#" class="mr-4">
                            <i class="fa-brands fa-instagram text-2xl text-yellow-500"></i>
                        </a>
                        <a href="#" class="mr-4">
                            <i class="fa-brands fa-whatsapp text-2xl text-yellow-500"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- right --}}
            <div class="md:w-2/3 border border-gray-400 shadow-sm">
                <div class="p-4">
                    <div class="font-bold text-green-500">Contact us directly</div>
                    {{-- message form --}}
                    <form action="{{ route( 'contact', ['type' => 'contact', 'origin' => 'conatct-page'] ) }}" method="POST">
                        @csrf
                        {{-- email --}}
                        <div class=" p-2">
                            <label for="">Email</label>
                            <input class="form-input" type="email" name="email" id="" placeholder="enter your email" required>
                        </div>
                        {{-- phonenumber --}}
                        <div class=" p-2">
                            <label for="">Phone number</label>
                            <input class="form-input" type="text" name="phone_number" id="" placeholder="enter your phone number" required>
                        </div>
                        {{-- message --}}
                        <div class=" p-2">
                            <label for="">Message</label>
                            <textarea name="message" id="" rows="6" class="form-input" placeholder="type message here..." required></textarea>
                        </div>
                        <button class="btn-warning w-full text-white justify-center my-2 p-2" type="submit">
                             Send message
                             <i class="fa-solid fa-message pl-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection