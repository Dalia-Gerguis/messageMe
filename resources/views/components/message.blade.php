@props(['message' => $message])

<div class="mb-4">
    <p href="{{ route('message.create', $message->reciever_id) }}" class="font-bold">{{ $message->reciever_id->name }}</p> <span class="text-gray-600 text-sm">{{ $message->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $message->body }}</p>

    {{--  @can('delete', $message)
        <form action="{{ route('messages.destroy', $message) }}" method="message">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan  --}}

    {{--  <div class="flex items-center">
        @auth
            @if (!$message->likedBy(auth()->user()))
                <form action="{{ route('messages.likes', $message) }}" method="message" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('messages.likes', $message) }}" method="message" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth

        <span>{{ $message->likes->count() }} {{ Str::plural('like', $message->likes->count()) }}</span>
    </div>  --}}
</div>