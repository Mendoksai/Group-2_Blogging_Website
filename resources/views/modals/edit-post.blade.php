
<div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="fixed inset-0 backdrop-blur-sm bg-black bg-opacity-40 -z-30"></div>
    <div class="bg-gray-800 p-4 rounded-lg shadow-xl max-w-md w-full">
        <h1 class="text-lg text-white mb-4">{{ __('Edit your post') }}</h1>
        <form action="{{ route('posts.update', ['postId' => $post->id]) }}" method="post">
            @csrf
            @method('PUT')
            <!-- Form fields for editing the post -->
            <div>
                <x-input-label>{{ __('Title') }}</x-input-label>
                <x-textarea-input class="w-full h-12 resize-y overflow-y-auto my-1 col-span-5" name="title" placeholder="Enter a title for your post.">{{ $post->title }}</x-textarea-input>
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>
            <div class="mt-3">
                <x-input-label>{{ __('Contents') }}</x-input-label>
                <x-textarea-input class="w-full h-12 resize-y overflow-y-auto my-1 col-span-5" name="content" placeholder="Description of your post.">{{ $post->content }}</x-textarea-input>
                <x-input-error class="mt-2" :messages="$errors->get('content')" />
            </div>
            <div class="flex flex-col md:flex-row uppercase mt-3">
                <button type="button" @click="showModal = false" class="my-1 p-2 bg-gray-300 hover:bg-gray-200 hover:text-black flex items-center justify-center align-center px-4 py-2 border border-transparent rounded-md font-semibold text-sm text-white dark:text-gray-800 uppercase focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" class="text-white my-1 p-2 bg-blue-700 hover:bg-blue-900 flex items-center justify-center align-center px-4 py-2 border border-transparent rounded-md font-semibold text-sm uppercase transition ease-in-out duration-150 md:ml-3 sm:-ml-3">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
</div>