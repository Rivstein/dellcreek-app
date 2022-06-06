{{-- subscribe --}}
<div class="w-full py-10 bg-yellow-400">
    {{-- title --}}
    <h1 class="text-center text-3xl pt-10 mb-10 font-bold">
        Subscribe for updates
    </h1>
    <div class="flex flex-wrap mx-auto px-10 items-center">
        <div class="p-5 md:w-1/2 flex justify-center">
            <img src="{{ asset('img/illustrations/subscribe.png') }}" alt="subscribe illustration">
        </div>
        <div class="p-5">
            <div class="font-semibold text-md md:w-2/3 md:text-left text-center">
                Subscribe to get updates on listed properties, news and all things
                property.
            </div>
            <form action="{{ url('newsletter') }}" method="POST">
                @csrf
                <div class="my-5 bg-white md:w-2/3 py-2 px-4 border border-gray-400 rounded-md shadow-md hover:shadow-lg">
                    <input type="email" class="w-full" name="email" placeholder="Enter email">
                </div>
                <div class="mb-3 bg-white md:w-2/3 py-2 px-4 border border-gray-400 rounded-md shadow-md hover:shadow-lg">
                    <input type="text" placeholder="Phone number" name="phone_number">
                </div>
                <input type="hidden" value="newsletter" name="type">
                <div class="md:text-left text-center">
                    <button class="bg-gray-700 text-white py-2 px-4 rounded shadow">
                        Subscribe
                    </button>    
                </div>
                
            </form>
        </div>   
    </div>
</div>