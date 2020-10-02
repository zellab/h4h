@extends('layouts.app')

@section('content')
    
    <div class="back-button mt-5">
        <a href="/"><span class="text-blue-600 font-bold text-sm">&LeftArrow; Back</span></a>
    </div>

    <div class="heading mt-8 w-full relative">
        <span class="py-1 px-2 rounded-lg bg-yellow-500 text-white font-bold text-xs">Category: {{ $question->question_category }}</span>
        <img src="/uploads/{{ $question->question_image }}" alt="header image" class="rounded-lg w-full object-cover h-64 my-4 shadow-lg">
        <span class="py-1 px-2 rounded-lg bg-green-500 text-white font-bold text-xs">Deadline: {{ $question->question_deadline }}</span>
        <p class="text-sm font-bold mt-5 italic text-blue-600">Problem Statement</p>
        <p class="text-xl leading-tight break-words">{{ $question->question_title }}</p>

        <div class="guidelines mt-8">
            <p class="text-sm font-bold mt-5 italic text-blue-600">Description</p>
            <ul class="mt-2 leading-tight break-words">
                <li>{{ $question->question_guidelines }}</li>
            </ul>
        </div>
    </div>

    <a href="/guidelines"><button class="mt-5 py-1 px-2 rounded-lg bg-blue-600 text-white">Guidelines</button></a>
    @if ($user->admin == 1)
    <form action="{{ url('/question') }}/{{ $question->id }}/delete" method="post" class="mt-5">
        <button type="submit" class="text-white bg-red-500 px-2 py-1 rounded-lg ">Delete Problem</button>
        @csrf
    </form>
    @endif

    <hr class="my-6">

    <div class="submit mb-16">
        <p class="text-2xl">Submit a solution</p>
        
        <div class="error-display my-4">
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
        </div>
        
    <form action="{{ url('/question') }}/{{ $question->id }}/submit" method="post" class="mt-3" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block">
                    <span class="text-gray-700 text-sm">Describe your solution (max 1000 characters)</span><br>
                    <textarea name="submission" id="" rows="10" class="form-input mt-1 block w-full text-sm"></textarea>
                </label>
            </div>
            <div class="mb-4">
                <label class="block">
                    <span class="text-gray-700 text-sm">Upload a solution in pdf format (optional)</span><br>
                    <input type="file" name="file" id="" class="bg-black text-white rounded-lg">
                </label>
            </div>
            <button type="submit" class="py-1 px-2 rounded-lg bg-blue-600 text-white font-bold">Submit</button>
        @csrf
        </form>
    </div>

    <div class="problems mt-10">
        <p class="text-xl">Problems</p>
        <div class="cards lg:grid lg:grid-flow-row lg:grid-cols-3">
            @foreach ($questions as $question)
            <a href="/question/{{ $question->id }}/view">
                <div class="card-item shadow-lg rounded-lg m-2 h-32 mb-4">
                    <div class="flex">
                        <img src="/uploads/{{ $question->question_image }}" alt="" class="h-32 w-32 object-cover rounded-lg">
                        <div class="problem-content p-3">
                            <p class="text-sm"><span class="py-1 px-2 rounded-lg text-white bg-blue-600">Deadline: {{ $question->question_deadline }}</span></p>
                            <p class="text-sm leading-tight mt-2 ">{{ \Illuminate\Support\Str::limit($question->question_title, 100, $end='...') }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection