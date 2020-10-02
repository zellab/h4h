@extends('layouts.auth')

@section('content')
    <div class="form flex h-screen justify-center items-center">
        <div class="login-form lg:w-4/12 w-10/12  rounded shadow-lg rounded-lg atext-center p-5 m-5">
            <p class="mb-4 text-xl font-bold">Login to your account</p>
            
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

            <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf
                <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700 text-sm">Email</span>
                        <input type="email" name="email" class="form-input mt-1 block w-full text-sm" placeholder="john@example.com">
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700 text-sm">Password</span>
                        <input type="password" name="password" class="form-input mt-1 block w-full text-sm">
                    </label>
                </div>
                <button class="mt-4 bg-blue-600 rounded-lg text-white py-1 px-2 font-bold" type="submit">Login</button>
                <p class="mt-3 text-sm">Don't have an account? <a href="/register" class="text-blue-600  font-bold">Register</a></p>
            </form>
        </div>
    </div>
@endsection