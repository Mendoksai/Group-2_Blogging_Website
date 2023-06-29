<div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="fixed inset-0 backdrop-blur-sm bg-black bg-opacity-60 -z-50"></div>
    <div class="bg-gray-800 p-4 rounded-lg shadow-xl flex flex-col items-center">
        <!-- Added flex and items-center here -->
        <p>Are you sure you want to delete your reply in this comment?</p>

        <div class="mt-4 flex justify-center">
            <!-- Changed justify-end to justify-center -->
            <button type="button"
                class="px-4 py-2 bg-gray-200 hover:bg-gray-700 hover:text-white rounded-lg text-gray-700"
                @click="showModal = false">
                Cancel
            </button>

            <form action="{{ route('comments.destroyReply', ['reply' => $reply->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white ml-2">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
