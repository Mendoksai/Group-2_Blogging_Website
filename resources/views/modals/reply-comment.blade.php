<div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="fixed inset-0 backdrop-blur-sm bg-black bg-opacity-30 -z-50"></div>
    <div class="bg-gray-800 w-96 text-white h-auto p-4 rounded-lg shadow-xl mx-5 my-8">
        <p class="mb-3 mt-2 text-lg font-light">You are replying to <span
                class="font-black text-slate-400">{{ $comment->user->first_name }}
                {{ $comment->user->last_name }}</span>'s comment</p>

        <form id="comment-form" action="{{ route('comments.storeReply', ['comment' => $comment->id]) }}" method="POST">
            @csrf
            <div class="grid grid-cols-6 gap-2">
                <x-textarea-input class="col-span-6 h-56 w-80" name="reply" placeholder="Enter your reply here...">
                </x-textarea-input>
            </div>

            <div class="mt-4 flex justify-end">
                <x-secondary-button type="button" x-on:click="showModal = false">Cancel</x-secondary-button>
                <x-primary-button type="submit" class="ml-2">Reply</x-primary-button>
            </div>
        </form>
    </div>
</div>
