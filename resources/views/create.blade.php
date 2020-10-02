@extends('layouts.app')

@section('content')
    
    <div class="back-button mt-5">
        <a href="/admin"><span class="text-blue-600 font-bold text-sm">&LeftArrow; Back</span></a>
    </div>

    <div class="heading mt-5 h-80 w-full relative">
        <p class="text-xl font-bold">Create a new Problem</p>
    </div>

    <div class="problem-form">
        
        <div class="error-display my-4 text-sm">
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
        
        <form action="{{ route('question.create') }}" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block">
                    <span class="text-gray-700 text-sm">Problem (max 1000 Characters)</span><br>
                    <textarea name="question_title" id="" rows="3" class="form-input mt-1 block w-full text-sm"></textarea>
                </label>
            </div>
            <div class="mb-4">
                <label class="block">
                    <span class="text-gray-700 text-sm">Problem Description (max 1000 Characters)</span><br>
                    <textarea name="question_guidelines" id="" rows="3" class="form-input mt-1 block w-full text-sm"></textarea>
                </label>
            </div>
            <div class="mb-4">
                <label class="block">
                    <span class="text-gray-700 text-sm">Category of Problem</span><br>
                    <input type="text" name="question_category" class="form-input mt-1 block w-full">
                </label>
            </div>
            <div class="mb-4">
                <label class="block">
                    <span class="text-gray-700 text-sm">Upload an image for problem</span><br>
                    <input type="file" name="question_image" id="" class="bg-black text-white rounded-lg">
                </label>
            </div>
            <div class="mb-4">
                <label class="block">
                    <span class="text-gray-700 text-sm">Deadline for Submission</span><br>
                    <input type="date" name="question_deadline" id="" class="py-1 px-2 rounded border border-black">
                </label>
            </div>
            <button type="submit" class="rounded-lg bg-blue-600 text-white font-bold py-1 px-2">Create</button>
        @csrf
        </form>
    </div>

@endsection