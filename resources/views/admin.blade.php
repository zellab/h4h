@extends('layouts.app')

@section('content')
    <div class="heading mt-5 w-full relative">        
        <div class="flex relative">
            <p class="text-xl font-bold">Welcome Admin</p>
            <a href="{{ route('question.create') }}"><button class="py-1 px-2 bg-green-500 text-white rounded-lg absolute right-0">Create problem 🤣</button></a>
        </div>
        <div class="flex mt-5">
            <div class="w-1/3 mx-2 text-center">
                <p class="text-4xl font-bold">{{ $questionCount }}</p>
                <p class="leading-tight">Problems in the platform</p>
            </div>
            <div class="w-1/3 mx-2 text-center">
                <p class="text-4xl font-bold">{{ $submissionCount }}</p>
                <p class="leading-tight">Solutions submitted</p>
            </div>
            <div class="w-1/3 mx-2 text-center">
                <p class="text-4xl font-bold">{{ $userCount }}</p>
                <p class="leading-tight">Users in the platform</p>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="submissions mt-5">
        <p class="text-xl">All submissions</p>
        <div class="submitted  mt-5">
            
            @foreach ($submissions as $submission)
            
            <a href="/admin/submission/{{$submission->id}}/view">
                <div class="submitted-item rounded-lg w-full shadow-lg p-4 mb-6">
                    <p><span class="font-bold">Submission # {{ $submission->id }}</span></p>
                    @foreach ($users as $user)
                        @if ($user->id == $submission->user_id)
                            <p><span>User: {{ $user->name }}</span></p>
                            <p><span>Email: {{ $user->email }}</span></p>
                        @endif
                    @endforeach
                    @foreach ($questions as $question)
                        @if ($question->id == $submission->question_id)
                            <p class="truncate mb-2"><span>Problem: {{ $question->question_title }}</span></p>
                        @endif
                    @endforeach
                    <p class="mt-3"><span class="text-sm text-blue-600 font-bold rounded-lg border border-blue-600 py-1 px-2">Submitted on: {{ $submission->created_at }}</span></p>
                </div>  
            </a>
            
            @endforeach

        </div>
        <div class="">{{ $submissions->links() }}</div>
    </div>
@endsection