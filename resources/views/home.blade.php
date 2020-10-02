@extends('layouts.app')

@section('content')
    <div class="heading mt-5 w-full relative">        
        <p class="text-xl font-bold">Welcome {{ $user->name }}</p>
        <p class="mt-4 italic text-sm">(My Information)</p>
        <p><span class="font-bold text-blue-600">Email</span>: {{ $user->email }}</p>
        <p><span class="font-bold text-blue-600">Phone</span>: {{ $user->phone }}</p>
        <p><span class="font-bold text-blue-600">College</span>: {{ $user->college }}</p>
        <p><span class="font-bold text-blue-600">Department</span>: {{ $user->department }}</p>
    </div>

    <hr class="my-5">

    <div class="submissions mt-5">
        <p class="text-xl">My submissions</p>
        <div class="submitted  mt-5">
            
            @foreach ($submissions as $submission)
            
            <div class="submitted-item rounded-lg w-full shadow-lg p-4 mb-6">
                @foreach ($questions as $question)
                    @if ($question->id == $submission->question_id)
                        <p><span class="font-bold text-green-500">Problem:</span> {{ $question->question_title }}</p>
                    @endif
                @endforeach
                <p class="mt-2"><span class="font-bold text-green-500">Solution:</span> {{ $submission->submission }}</p>
                <p class="mt-3"><span class="text-sm text-blue-600 font-bold rounded-lg border border-blue-600 py-1 px-2">Submitted on: {{ $submission->created_at }}</span></p>
            </div>  
            
            @endforeach

        </div>
    </div>
@endsection