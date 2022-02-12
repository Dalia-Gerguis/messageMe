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

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{-- @dd($message) --}}
                    @if ($message->reciever_id == auth()->id())
                        {{ 'Message from ' . $message->sender->name }}
                    @endif
                    @if ($message->sender_id == auth()->id())
                        {{ 'Message to ' . $message->reciever->name }}
                    @endif
                </header>

                <div class="w-full p-6">
                    <div
                        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ $message->body }} </p>

                        <a href="{{ route('reply.create', $message->id )}}"
                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Reply
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @if ($message->replies->count())
                    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                        <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8">
                            Replies:
                        </header>

                        <div class="w-full flex flex-col items-end p-6">
                            @forelse ($message->replies as $reply)
                                <div
                                    class="w-11/12 p-6 mt-4 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $reply->user->id == auth()->id() ? 'You' : $reply->user->name }}
                                    </h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ $reply->body }}
                                    </p>

                                </div>
                            @empty
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">No Replies yet! </p>
                            @endforelse
                        </div>
                    </section>
                @endif
            </section>
        </div>
    </main>
@endsection
