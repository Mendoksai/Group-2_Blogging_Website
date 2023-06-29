<div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="fixed inset-0 backdrop-blur-sm bg-black bg-opacity-30 -z-50"></div>
    <div class="bg-gray-800 w-96 text-white h-auto p-4 rounded-lg shadow-xl  mx-5 my-8">
        <p class="mb-3 mt-2 text-lg font-semibold">Edit your comment</p>
        
        <form id="comment-form" action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="post">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-6 gap-2">
                <x-textarea-input class="col-span-6 h-56 w-80" name="comment_content" placeholder="Edit your comment">{{ $comment->comment_content }}</x-textarea-input>
            </div>
            
            <div class="mt-4 flex justify-end">
                <x-secondary-button type="button" x-on:click="showModal = false">Cancel</x-secondary-button>
                <x-primary-button type="submit" class="ml-2">Save</x-primary-button>
            </div>
        </form>
    </div>
</div>
