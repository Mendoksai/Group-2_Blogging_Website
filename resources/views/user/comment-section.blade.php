<!-- Loop through the comments and display them -->
@foreach ($comments as $comment)
    <div>
        <!-- Display the comment information -->
        <h4>{{ $comment->user->name }}</h4>
        <p>{{ $comment->content }}</p>
    </div>
@endforeach

<!-- Add the comment form at the bottom -->
<form id="comment-form" action="{{ route('comments.store') }}" method="post">
    @csrf
    <h1 class="font-bold">Comment</h1>
    <div class=" grid grid-cols-6 gap-2">
        <input type="hidden" value="{{ $post->id }}" name="post_id">
        <input type="hidden" value="{{ $post->first_name }}" name="first_name">
        <x-textarea-input class="w-full h-auto my-1 col-span-5" name="comment_content" placeholder="Add comment">
        </x-textarea-input>
        <div>
            <x-primary-button class="my-1 col-span-1 flex flex-row items-center justify-center">
                <span class=" lg:hidden">
                    <svg width="25" height="25" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m22.34 10.642-.007-.003-20.02-8.303a1.104 1.104 0 0 0-1.04.1 1.156 1.156 0 0 0-.523.966v5.31a1.125 1.125 0 0 0 .915 1.105l10.919 2.02a.187.187 0 0 1 0 .368L1.665 14.224a1.125 1.125 0 0 0-.915 1.104v5.31a1.105 1.105 0 0 0 .496.924 1.123 1.123 0 0 0 1.066.097l20.02-8.256.008-.004a1.5 1.5 0 0 0 0-2.757Z">
                        </path>
                    </svg>
                </span>
                <span class="hidden md:inline-block px-2">
                    {{ __('Comment') }}
                </span>
            </x-primary-button>
        </div>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('comment_content')" />
</form>
