{{-- crud form for users --}}

<form action="{{ $action ?? '' }}" method="POST">
    @csrf
    @if (isset($edit))
        @method('PATCH')
    @endif
    {{-- user details --}}
    <div class="p-2 border-b border-b-gray-500">
        <h1 class="text-lg font-bold mb-3">User details</h1>
        <div class="flex flex-wrap items-start">
            {{-- name --}}
            <div class="p-3 md:w-1/3 w-full">
                <label for="">Name</label>
                <input type="text" value="{{ old('name') ?? ($user->name ?? '') }}" placeholder="enter user name"
                    name="name" class="form-input @error('name') form-invalid @enderror">
                @error('name')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                @enderror
            </div>

            {{-- email --}}
            @if (isset($edit))
                <div class="p-3 md:w-1/3 w-full hidden">
                    <label for="">Email</label>
                    <input type="text" value="{{ old('email') ?? ($user->email ?? '') }}"
                        placeholder="enter user email" name="email"
                        class="form-input @error('email') form-invalid @enderror">
                    @error('email')
                        <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            @else
                <div class="p-3 md:w-1/3 w-full">
                    <label for="">Email</label>
                    <input type="text" value="{{ old('email') ?? ($user->email ?? '') }}"
                        placeholder="enter user email" name="email"
                        class="form-input @error('email') form-invalid @enderror">
                    @error('email')
                        <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            @endif

            {{-- phone number --}}
            <div class="p-3 md:w-1/3 w-full">
                <label for="">Phone number</label>
                <input type="text" value="{{ old('phone_number') ?? ($user->phone_number ?? '') }}"
                    placeholder="enter phone number" name="phone_number"
                    class="form-input @error('phone_number') form-invalid @enderror">
                @error('phone_number')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    {{-- roles --}}
    @if (isset($edit))
        <div class="p-2 border-b border-b-gray-500">
            <h1 class="text-lg font-bold">System Roles</h1>
            <small class="text-xs">Select checkbox to assign or remove user roles </small>
            <div class="flex flex-wrap mx-4 my-2">
                @if (count($roles) > 0)
                    @foreach ($roles as $role)
                        <div class="md:1/3 mx-4">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="pr-4"
                            {{-- if user has role checked --}}
                            @if ($user->hasRole($role->name))
                                checked
                            @endif
                            >
                            <label for="roles">{{ $role->display_name }}</label>
                        </div>
                    @endforeach
                @else
                    no roles created
                @endif
            </div>
        </div>
    @else
        <div class="p-2 border-b border-b-gray-500">
            <h1 class="text-lg font-bold">System Roles</h1>
            <small class="text-xs">Select checkbox to assign user roles </small>
            <div class="flex flex-wrap mx-4 my-2">
                @if (count($roles) > 0)
                    @foreach ($roles as $role)
                        <div class="md:1/3 mx-4">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="pr-4">
                            <label for="roles">{{ $role->display_name }}</label>
                        </div>
                    @endforeach
                @else
                    no roles created
                @endif
            </div>
        </div>
    @endif

    {{-- submit btn --}}
    @if (isset($edit))
        <div class="flex justify-end p-5">
            <button class="btn-success">
                <span>Update</span>
                <i class="fa fa-check ml-3"></i>
            </button>
        </div>
    @else
        <div class="flex justify-end p-5">
        <button class="btn-success">
            <span>Create</span>
            <i class="fa fa-check ml-3"></i>
        </button>
    </div>
    @endif
    
    
</form>
