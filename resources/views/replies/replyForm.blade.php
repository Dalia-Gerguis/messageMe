@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Replying ..
                </header>

                <div class="w-full p-6">
                    <form class="w-full flex justify-center" method="POST"
                        action="{{ route('reply.store', $message->id) }}">
                        @csrf
                        <div class="flex w-full flex-col">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1"
                                    class="form-label inline-block mb-2 text-gray-700">Type
                                    your message</label>
                                <textarea name="body"
                                    class="
                                  form-control
                                  block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                "
                                    id="exampleFormControlTextarea1" rows="3" placeholder="Your message"></textarea>
                                @error('body')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit"
                                    class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection
