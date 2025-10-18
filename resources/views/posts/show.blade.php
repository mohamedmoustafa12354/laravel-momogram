<x-app-layout>

<div class="flex flex-row h-screen">
    {{-- Left Side --}}
    <div class="w-7/12 bg-black flex items-center justify-center">
        <img src="{{ asset('storage/'.$post->image) }}" 
             alt="{{ $post->description }}" 
             class="max-h-screen object-contain mx-auto">
    </div>

    {{-- Right Side --}}
    <div class="w-5/12 flex flex-col bg-white">
        {{-- Top --}}
        <div class="border-b-2">
            <div class="flex items-center p-5">
                <img src="{{ $post->owner->image }}" alt="" class="mr-2 h-10 w-10 rounded-full">
                <div class="grow">
                    <a href="/{{ $post->owner->name }}" class="font-bold">{{ $post->owner->name }}</a>
                </div>
                @if ($post->owner->id == auth()->id())
                   <a href="/p/{{ $post->slug }}/edit"><i class="bx bx-message-square-edit"></i></a>
                @endif
                 <form action="/p/{{ $post->slug }}/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">
                                <i class='bx bx-message-square-x ltr:ml-2 rtl:mr-2 text-xl text-red-600'></i>
                            </button>
                        </form>
            </div>
        </div>

        {{-- Middle --}}
        <div class="grow overflow-y-auto">
            <div class="flex items-start p-5">
                <img src="{{ $post->owner->image }}" class="mr-5 h-10 w-10 rounded-full">
                <div>
                    <a href="/{{ $post->owner->name }}" class="font-bold">{{ $post->owner->name }}</a>
                    {{ $post->description }}
                </div>
            </div>

            {{-- Comments --}}
            <div>
                @foreach($post->comments as $comment)
                    <div class="flex items-start px-5 py-2">
                        <img src="{{ $comment->owner->image }}" class="mr-5 h-10 w-10 rounded-full">
                        <div class="flex flex-col">
                            <div>
                                <a href="/{{ $comment->owner->name }}" class="font-bold">{{ $comment->owner->name }}</a>
                                {{ $comment->body }}
                            </div>
                            <div class="mt-1 text-sm font-bold text-gray-400">
                                {{ $comment->created_at->shortAbsoluteDiffForHumans() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Comment Form --}}
        <div class="border-t-2 p-5 border-gray-400">
            <form action="/p/{{ $post->slug }}/comment" method="post">
                @csrf
                <div class="flex flex-row items-center">
                    <textarea name="body" id="comment_body" 
                              placeholder="Add a comment..."
                              class="grow border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0 resize-none"></textarea>
                    <button type="submit" class="ml-5 border-none bg-white text-blue-500">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
