@extends('layouts.app')

@section('body')
<div class="mx-auto bg-white md:w-1/3 md:mt-20 md:shadow-lg rounded p-3 md:border border-gray-200">
    <div class="flex justify-between items-center my-6">
        <h1 class="text-4xl font-bold">Login</h1>
        <a href="{{ route('register') }}" class="text-sm text-blue-800">
            Create account
        </a> 
    </div>

    <form action="{{ route('login') }}" method="POST">
        @csrf

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

        <div class="mb-6">
            <label class="text-lg">Password</label>
            <input type="password" name="password" value="{{ old('password') }}"
                class="form-input py-2 mt-2 @error('password') form-invalid @enderror">
            @error('password')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <button type="submit" class="btn-success">
            Login
        </button>

    </form>

    <div class="text-center my-4">
        <a href="#" class="text-sm text-blue-800">
            Forgot password?
        </a>    
    </div>
    
    
</div>
@endsection
