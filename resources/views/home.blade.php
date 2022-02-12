@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="text-sm border border-t-8 rounded text-red-700 border-red-600 bg-red-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Dashboard
                </header>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                        You are logged in!
                    </p>
                </div>
                <div class="w-full p-6">
                    <div class="flex flex-col my-2">
                        <h2 class="text-gray-700 my-2">
                            Here's Our Users:
                        </h2>
                        @forelse ($users as $user)
                            <div class="w-full rounded-lg bg-green-100 shadow h-12 my-2 ">
                                <div class="flex justify-between mx-4">
                                    <p class="py-4">
                                        {{ $user->name }}
                                    </p>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded-xl">
                                        <a href="{{ route('message.create', $user->id) }}" class="no-underline">
                                            message
                                        </a>
                                    </button>

                                </div>
                            </div>
                        @empty
                            <div class="w-full rounded-lg bg-green-100 shadow h-12 my-2 flex items-center">
                                <div class="m-auto">
                                    There's no other users yet!
                                </div>
                            </div>
                        @endforelse
                        {{ $users->links() }}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
