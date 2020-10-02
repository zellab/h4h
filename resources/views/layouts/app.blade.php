<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="lg:px-40 px-5 py mb-5 mt-4">
            
            <div class="nav h-12 w-full py-3 text-sm">
                <div class="flex relative">
                    <a href="{{route('welcome')}}">
                        <img src="/images/header.jpg" alt="" class="h-10">
                    </a>
                    @guest
                    <ul class="right-0 absolute flex">
                        <a href="{{route('welcome')}}"><li class="mr-3 py-1 px-2 border rounded-full border-black"><i class="fa fa-home" aria-hidden="true"></i></li></a>
                        <a href="{{ route('login') }}"><li class="px-2 py-1 rounded-lg font-bold text-white bg-blue-600">Login</li></a>
                    </ul>  
                    @else
                    <ul class="right-0 absolute flex">
                        <a href="{{route('welcome')}}"><li class="mr-3 py-1 px-2 border rounded-full border-black"><i class="fa fa-home" aria-hidden="true"></i></li></a>
                        
                        @if (Auth::user()->admin == 1)
                        <a href="{{url('/admin')}}"><li class="mr-3 py-1 px-2 border rounded-full border-black"><i class="fa fa-gears" aria-hidden="true"></i></li></a>    
                        @endif
                        
                        <a href="{{route('home')}}"><li class="mr-3 py-1 px-2 border rounded-full border-black"><i class="fa fa-user" aria-hidden="true"></i></li></a>
                        <form action="{{ route('logout') }}" method="post">
                            <button class="px-2 py-1 rounded-lg font-bold text-white bg-blue-600" type="submit">Logout</button>
                        @csrf
                        </form>
                    </ul>   
                    @endguest                   
                </div>
            </div>
    
            <div class="main min-h-screen">
                @yield('content')
            </div>

        </div>   
    </div>
</body>
</html>
