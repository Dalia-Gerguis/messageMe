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

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <ul class="flex items-center">
                        @auth
                            <li>
                                <p class="p-3">{{ auth()->user()->name }}</p>
                            </li>
                            <li>
                                <a href="{{ route('user.inbox', auth()->id()) }}" class="p-3">Inbox</a>
                            </li>
                            <li>
                                <a href="{{ route('user.sent', auth()->id()) }}" class="p-3">Sent</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        @endauth

                        @guest
                            <li>
                                <a href="{{ route('login') }}" class="p-3">Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="p-3">Register</a>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
</body>

</html>
