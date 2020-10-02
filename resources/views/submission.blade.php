@extends('layouts.app')

@section('content')
    
    <div class="back-button mt-5">
        <a href="/admin"><span class="text-blue-600 font-bold text-sm">&LeftArrow; Back</span></a>
    </div>

    <div class="heading mt-8 w-full relative">
        <span class="py-1 px-2 rounded-lg bg-yellow-500 text-white font-bold text-xs">Category: {{ $question->question_category }}</span>
        <span class="py-1 px-2 rounded-lg bg-green-500 text-white font-bold text-xs">Deadline: {{ $question->question_deadline }}</span>
        <p class="text-sm font-bold mt-5 italic text-blue-600">Problem Statement</p>
        <p class="text-xl leading-tight break-words">{{ $question->question_title }}</p>

        <div class="guidelines mt-8">
            <p class="text-sm font-bold mt-5 italic text-blue-600">Guidelines</p>
            <ul class="mt-2 leading-tight break-words">
                <li>{{ $question->question_guidelines }}</li>
            </ul>
        </div>
    </div>

    <hr class="my-6">

    <div class="submit mb-16">
        <p class="text-2xl">Submitted by</p>
        <p><span class="font-bold text-blue-600">Name</span> {{ $user->name }}</p>
        <p><span class="font-bold text-blue-600">Email</span> {{ $user->email }}</p>
        <p><span class="font-bold text-blue-600">Phone</span> {{ $user->phone }}</p>
        <p><span class="font-bold text-blue-600">College</span> {{ $user->college }}</p>
        <p><span class="font-bold text-blue-600">Department</span> {{ $user->department }}</p>
        <p>
            @if ($user->ieeemember == 1)
                <span class="font-bold text-blue-600">Membership</span> IEEE Member
            @else
                <span class="font-bold text-blue-600">Membership</span> Non-IEEE Member
            @endif
        </p>
        <p><span class="font-bold text-blue-600">Submitted on</span> {{ $submission->created_at }}</p>

        <p class="mt-6 text-lg font-bold mb-3">Solution</p>
        <p>{{ $submission->submission }}</p>
        
        @if (isset($submission->file))
            <p class="mt-2">Download the attached PDF file 
                <br>
                <a href="/uploads/{{ $submission->file }}"><button class="px-2 py-1 rounded-lg text-white bg-blue-600 mt-2">Download PDF</utton></a>
            </p>
        @endif

    </div>
    
@endsection