@extends('layouts.auth')

@section('content')
    <div class="form flex h-screen justify-center items-center my-24">
        <div class="login-form lg:w-4/12 w-10/12 rounded shadow-lg rounded-lg atext-center p-5 m-5">
            <p class="mb-4 text-xl font-bold">Create an account</p>
            @if ($errors->any())
                <div class="w-full bg-red-100 rounded-lg shadow-lg p-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message'))
                <div class="w-full bg-blue-100 rounded-lg shadow-lg p-5">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}" class="mt-4">
            @csrf
                <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700 text-sm">Name</span>
                        <input type="text" name="name" class="form-input mt-1 block w-full text-sm" placeholder="John Doe" required>
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700 text-sm">Email</span>
                        <input type="email" name="email" class="form-input mt-1 block w-full text-sm" placeholder="john@example.com" required>
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700 text-sm">Phone</span>
                        <input type="number" name="phone" class="form-input mt-1 block w-full text-sm" placeholder="9999888899" required>
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700 text-sm">College</span>
                        <input type="text" name="college" class="form-input mt-1 block w-full text-sm" placeholder="College of Engineering Karunagappally">
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700 text-sm">Department</span>
                        <input type="text" name="department" class="form-input mt-1 block w-full text-sm" placeholder="Electrical and Electronics" required>
                    </label>
                </div>
                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="hidden"  class="form-checkbox" name="ieeemember" value="0" required>
                        <input type="checkbox" class="form-checkbox" name="ieeemember" value="1" required>
                        <span class="ml-2 text-gray-700 text-sm">IEEE Member?</span>
                      </label>
                </div>
                <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700 text-sm">Password</span>
                        <input type="password" name="password" class="form-input mt-1 block w-full text-sm" required>
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700 text-sm">Confirm Password</span>
                        <input type="password" name="password_confirmation" class="form-input mt-1 block w-full text-sm" required>
                    </label>
                </div>
                <button class="mt-4 bg-blue-600 rounded-lg text-white py-1 px-2 font-bold" type="submit">Register</button>
                <p class="mt-3 text-sm">Already have an account? <a href="/login" class="text-blue-600  font-bold">Login</a></p>
            </form>
        </div>
    </div>
@endsection