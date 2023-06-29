<div class="text-black my-3 bg-gray-300 p-4 rounded-lg">
    <div class="flex justify-between">
        <div class="flex flex-row">
            <div class="flex px-2 items-center">
                <img class="w-12 h-12 rounded-full bg-slate-200"
                    src="{{ asset('imgs/default_profile.jpg') }}" alt="profile pic">
            </div>
            <div class="flex flex-col justify-center px-2">
                <a {{-- href="{{ route('user.show', ['user_id' => $post->user_id, 'first_name' => $post->first_name, 'last_name' => $post->last_name]) }}"  --}} class=" hover:underline ">
                    <h4 class="font-bold text-xl">SAmple Name</h4>
                </a>
                <small class="font-light">Jnuary 98, 23812</small>
                <small class="capitalize">Debugging</small>
            </div>
        </div>
        <div class="px-2 text-2xl flex items-center uppercase">
            <h1><b>Debugg</b></h1>
        </div>
    </div>
    <h2 class=" mt-4 text-lg"><b>Devbuing</b></h2>
    <p class=" text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam,
        excepturi, recusandae harum nihil porro, sunt et a alias numquam beatae sapiente quidem.
        Ullam necessitatibus itaque doloremque et fugiat explicabo inventore?</p>
    {{-- comment field --}}
    <div class="border-t-2 border-blue-800 mt-4 py-2">
        <div class="mt-4 bg-slate-600 text-white p-2 rounded-lg">
            <div class="flex flex-row justify-between ">
                <div class="flex flex-row items-center justify-center">
                    <img class="w-10 h-10 rounded-full bg-slate-200"
                        src="{{ asset('imgs/default_profile.jpg') }}" alt="user profile pic">
                    <h4 class="font-bold px-2">User Name</h4>
                </div>
                <small>Jnauary 24, 2023</small>
            </div>
            <p class="pt-3 pl-1">This is my comment hehe</p>
            <div class=" justify-start pl-1">
                <small class="mx-1">Reply</small>
                <small class="mx-1">Edit</small>
                <a href="#"><small class="mx-1">Delete</small></a>
            </div>
        </div>
        {{-- end of comment field --}}
        

        {{-- comment form --}}
        <form action=" {{ route('comments.store') }} " method="post">
            @csrf
            <h1 class="font-bold">Comment</h1>
            <div class=" grid grid-cols-6 gap-2">
                <input type="hidden" {{-- value="{{ $post->id }}" --}} name="post_id">
                <x-textarea-input class="w-full h-auto my-1 col-span-5" name="comment_content"
                    placeholder="Add comment"></x-textarea-input>
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
    </div>
    {{-- end of commemnt --}}
</div>

