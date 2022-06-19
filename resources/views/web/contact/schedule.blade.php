{{-- schedule form --}}

<form action="{{ route('contact',['type' => 'site_visit', 'origin' => $origin, 'property_id' => $property->id]) }}"
    method="POST">
    @csrf
    {{-- date --}}
    <label for="" class="font-mono">Date</label>
    <input type="date" class="form-input w-full mt-2 mb-3" name="date" required>

    {{-- phone number --}}
    <label for="" class="font-mono">Phone number</label>
    <input type="text" class="form-input w-full mt-2 mb-3" name="phone_number" placeholder="Enter your phone number"
        required>

    {{-- email --}}
    <label for="" class="font-mono">Email</label>
    <input type="email" class="form-input w-full mt-2 mb-3" name="email" placeholder="Enter your email address"
        required>

    {{-- message --}}
    <label for="" class="font-mono">Message</label>
    <textarea name="message" id="" rows="3" class="form-input w-full mt-2 mb-3"
        required>I would like to schedule a site visit for {{$property->name}}</textarea>

    {{-- submit btn --}}
    <div class=" flex justify-center">
        <button class="btn-warning  mt-6 my-2">
            Schedule visit
            <i class="pl-4 fa-solid fa-arrow-right"></i>
        </button>
    </div>
</form>