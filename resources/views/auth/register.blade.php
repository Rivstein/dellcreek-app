@extends('layouts.app')

@section('body')
<div class="mx-auto bg-white md:w-1/3 md:mt-3 md:shadow-lg rounded p-3 md:border border-gray-200">
    <div class="flex justify-between items-center my-6">
        <h1 class="text-4xl font-bold">Register</h1>
        <a href="{{ route('login') }}" class="text-sm text-blue-800">
            Already have account?
        </a> 
    </div>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="text-lg">Name</label>
            <input type="text" name="name" placeholder="Enter name" value="{{ old('name') }}"
                class="form-input py-2 mt-2 @error('name') form-invalid @enderror">
            @error('name')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="text-lg">Phone number</label>
            <input type="text" name="phone_number" placeholder="Enter phone number" value="{{ old('phone_number') }}"
                class="form-input py-2 mt-2 @error('phone_number') form-invalid @enderror">
            @error('phone_number')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="text-lg">Email</label>
            <input type="email" name="email" placeholder="Enter email" value="{{ old('email') }}"
                class="form-input py-2 mt-2 @error('email') form-invalid @enderror">
            @error('email')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="text-lg">Password</label>
            <input type="password" name="password"
                class="form-input py-2 mt-2 @error('password') form-invalid @enderror">
            @error('password')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label class="text-lg">Confirm password</label>
            <input type="password" name="password_confirmation"
                class="form-input py-2 mt-2 @error('password') form-invalid @enderror">
        </div>
        
        <button type="submit" class="btn-success">
            Register
        </button>

    </form>

    <div class="text-center my-4">
        <a href="#" class="text-sm text-blue-800">
            Forgot password?
        </a>    
    </div>
    
    
</div>
@endsection
