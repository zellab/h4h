@extends('layouts.app')

@section('content')
    <div class="heading mt-5 h-80 w-full relative">
        <img src="/images/header.jpg" alt="header image" class="rounded-lg w-full object-cover h-64">
        <p class="absolute top-0 left-0 lg:mx-12 mx-3 lg:my-14 my-12 text-white lg:text-5xl text-2xl lg:leading-none leading-snug">Online Hackathon/Problem Competition Platform</p>
        <p class="absolute bottom-0 left-0 lg:ml-12 ml-3 lg:mb-12 mb-8 leading-tight text-white text-sm italic">This platform is developed by the Open Source Community at Zellab Dynamics Pvt. Ltd. <br> For any commercial use, please take permission from the creator.</p>
    </div>

    <div class="problems mt-10">
        <p class="text-xl">About</p>
        <div class="about leading-tight mt-4">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta error porro corrupti ad sint autem qui. Numquam, vitae provident quidem qui reiciendis facere! Mollitia sequi ut incidunt laborum voluptatem accusantium. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque perferendis assumenda architecto ullam quo quia illo id totam, minima pariatur non temporibus, odio nemo, vero ea amet maxime enim velit.</p>
        </div>
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