<!-- CreatePostModal.blade.php -->
<div x-data="{ showModal: false }">
    <!-- Open modal link -->
    <button @click="showModal = true" class="text-white bg-blue-600 px-4 py-2 rounded-lg">
        Create Post
    </button>

    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 backdrop-blur-sm bg-black bg-opacity-40 -z-30"></div>
        <div class="bg-gray-800 p-4 rounded-lg shadow-xl max-w-md w-full">
            <h1 class="text-lg text-white mb-4">{{ __('Create post') }}</h1>

            <script>
                // ...
                data() {
                    return {
                        // ...
                        uploadedFile: null,
                    };
                },
                methods: {
                    handleFileChange(event) {
                        const file = event.target.files[0];
                        this.uploadedFile = file;
                        // Perform any additional logic or processing here
                    },
                },
            </script>
            

            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <div>
                    <x-input-label>{{ __('Title') }}</x-input-label>
                    <x-textarea-input required class="w-full h-12 esize-y overflow-y-auto my-1 col-span-5"
                        name="title" placeholder="Enter a title for your post."></x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
                <div class="mt-3">
                    <x-input-label>{{ __('Contents') }}</x-input-label>
                    <x-textarea-input required class="w-full h-12 esize-y overflow-y-auto my-1 col-span-5"
                        name="content" placeholder="Description of your post."></x-textarea-input>
                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                </div>
                {{-- <div class="mt-3 text-white">
                    <div class="mt-3">
                        <x-input-label>{{ __('Upload') }}</x-input-label>
                        <input type="file"
                            class="bg-gray-800 appearance-none border-none rounded-md py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline"
                            name="file" @change="handleFileChange" />
                        <x-input-error class="mt-2" :messages="$errors->get('file')" />
                    </div>
                </div>
                <div class="mt-3">
                    <x-input-label>{{ __('Preview') }}</x-input-label>
                    <div>
                        <template x-if="uploadedFile && uploadedFile.type.includes('image/')">
                            <img :src="URL.createObjectURL(uploadedFile)" alt="Preview" class="w-32 h-32">
                        </template>
                        <template x-else>
                            <div class="w-32 h-32 bg-gray-200 flex items-center justify-center">
                                <span x-text="uploadedFile ? uploadedFile.name : 'No file selected'"></span>
                            </div>
                        </template>
                    </div>
                </div>                 --}}
                <div class="flex flex-col md:flex-row uppercase mt-3">
                    <button @click="showModal = false" type="button"
                        class="my-1 p-2 bg-gray-300 hover:bg-gray-200 hover:text-black flex items-center justify-center align-center px-4 py-2 border border-transparent rounded-md font-semibold text-sm text-white dark:text-gray-800 uppercase focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit"
                        class="text-white my-1 p-2 bg-blue-700 hover:bg-blue-900 flex items-center justify-center align-center px-4 py-2 border border-transparent rounded-md font-semibold text-sm uppercase transition ease-in-out duration-150 md:ml-3 sm:-ml-3">
                        {{ __('Post') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
