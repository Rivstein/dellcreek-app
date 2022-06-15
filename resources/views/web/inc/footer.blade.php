{{-- footer --}}
<div class="bg-slate-900 text-white px-4 py-8">
    <div class="flex flex-wrap w-full">
        {{-- info --}}
        <div class="w-full md:w-4/12 py-5 md:px-5 px-3">
            <div class="flex items-center my-4">
                <img src="{{ asset('img/logo.png') }}" alt="" class="w-14">
                <h3 class="text-2xl pl-2 pt-3 font-ui-monospace font-bold">
                    <span class="text-yellow-500">Dellcreek</span>
                    <span>Developers</span>
                </h3>
            </div>
            <div class="my-4 tracking-wider">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Doloremque rerum nihil itaque debitis,
                temporibus eaque sapiente sequi
            </div>
            <div class="flex items-center my-4">
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

        {{-- contact --}}
        <div class="w-full md:w-2/12 py-5 md:px-5 px-3">
            <h3 class="text-2xl my-3 font-ui-monospace font-bold">Contact</h3>
            <ul>
                <li class="my-4 flex">
                    <i class="fa-solid fa-location-dot text-xl text-yellow-400 pr-4"></i>
                    <span class="text-sm">
                        Dellcreek Developers ltd, cKrishna Centre, Westlands
                    </span>
                </li>
                <li class="my-4 flex">
                    <i class="fa-solid fa-phone text-xl text-yellow-400 pr-4"></i>
                    <span>+ 254 715731111</span>
                </li>
                <li class="my-4 flex">
                    <i class="fa-solid fa-envelope text-xl text-yellow-400 pr-4"></i>
                    <span>info@dellcreek.co.ke</span>
                </li>
            </ul>
        </div>

        {{-- links --}}
        <div class="w-full md:w-2/12 py-5 md:px-5 px-3">
            <h3 class="text-2xl my-3 font-ui-monospace font-bold">Useful links</h3>
            <ul>
                <li class="my-4 flex">
                    <a href="{{ url('/') }}" class="hover:underline">
                        Home
                    </a>
                </li>
            </ul>
        </div>

        {{-- contact form --}}
        <div class="w-full md:w-4/12 py-5 md:px-5 px-3">
            <h3 class="text-2xl my-3 font-ui-monospace font-bold">Contact us</h3>
            <form action="{{ route('contact',['type'=>'contact','origin'=>'footer']) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Phone number</label>
                    <input type="number" name="phone_number" class="form-input bg-white" placeholder="071234578" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-input bg-white" placeholder="example@email.com" required>
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="message" rows="5" class="form-input bg-white text-black" placeholder="Message" required></textarea>
                </div>
                <button type="submit" class="btn-success">
                    Send message
                    <i class="fa-solid fa-paper-plane pl-2"></i>
                </button>
            </form>
        </div>
    </div>
    
    {{-- master head --}}
    <div class="border-t border-t-gray-500 py-4 mt-6 text-center">
        Dellcreek powered by 
        <a href="#" class="text-yellow-400 font-bold hover:underline">
            Mneti Solutions
        </a>
        &copy;
    </div>
    
</div>
