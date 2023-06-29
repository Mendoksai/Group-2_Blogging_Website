@php
    use Carbon\Carbon;
@endphp
<div class="text-gray-100 my-7 bg-gray-800 shadow-2xl px-6 py-4 rounded-lg">
    <div class="flex justify-between">
        <div class="flex flex-row">
            <div class="flex items-center">
                @if (!empty($post->user->profile_picture))
                    <img class=" w-12  h-12  rounded-full bg-slate-200 object-cover"
                        src="{{ asset($post->user->profile_picture) }}" alt="profile pic">
                @else
                    <img class="w-12  h-12  rounded-full bg-slate-200"
                        src="{{ asset('imgs/default_profile.jpg') }}" alt="profile pic">
                @endif
            </div>

            <div class="flex flex-col justify-center px-2">
                <a href="{{ route('user.show-profile', ['id' => $post->user_id]) }}"
                    class="hover:underline">
                    <h4 class="font-bold text-xl">{{ $post->first_name }}
                        {{ $post->last_name }}</h4>
                </a>

                <small class="font-light">{{ Carbon::parse($post->created_at)->format('F d, Y') }}
                    {{ Carbon::parse($post->created_at)->diffForHumans() }}
                </small>
                <small class="capitalize">{{ $post->account_role }}</small>
            </div>
        </div>


        <div class="px-2  flex items-center ">
            {{-- Delete option --}}
            @if ($post->user_id === Auth::user()->id)
                {{-- <h1> {{ $post->user_id }} </h1><span> my auth {{ Auth::user()->id }} </span> --}}
                <div x-data="{ showModal: false }"
                    class="  bg-red-700 hover:bg-red-800 rounded-lg flex justify-center items-center w-8 h-8">
                    <form action="{{ route('posts.destroy', ['postId' => $post->user_id]) }}"
                        method="post" class="inline" @submit.prevent="showModal = true">
                        @csrf
                        @method('DELETE')
                        <button @click="showModal = true">
                            <svg class="mt-1" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.36 4.2v1.2h4.2a.6.6 0 0 1 0 1.2h-.645L17.89 19.392a2.4 2.4 0 0 1-2.393 2.208H8.022a2.4 2.4 0 0 1-2.392-2.208L4.606 6.6H3.96a.6.6 0 0 1 0-1.2h4.2V4.2a1.8 1.8 0 0 1 1.8-1.8h3.6a1.8 1.8 0 0 1 1.8 1.8Zm-6 0v1.2h4.8V4.2a.6.6 0 0 0-.6-.6h-3.6a.6.6 0 0 0-.6.6Zm-1.8 4.235.6 10.2a.6.6 0 1 0 1.198-.072l-.6-10.2a.6.6 0 1 0-1.198.072Zm7.836-.633a.6.6 0 0 0-.633.564l-.6 10.2a.6.6 0 0 0 1.197.07l.6-10.2a.6.6 0 0 0-.564-.634ZM11.76 7.8a.6.6 0 0 0-.6.6v10.2a.6.6 0 1 0 1.2 0V8.4a.6.6 0 0 0-.6-.6Z">
                                </path>
                            </svg>
                        </button>
                    </form>
                    @include('modals.delete-post')
                </div>
                {{-- Edit option --}}
                <div x-data="{ showModal: false }"
                    class="ml-2 mr-4  bg-blue-700 hover:bg-blue-800 rounded-lg flex justify-center items-center w-8 h-8">
                    <form {{-- action="{{ route('posts.destroy', ['postId' => $post->user_id]) }}" --}} method="post" class=""
                        @submit.prevent="showModal = true">
                        @csrf
                        @method('DELETE')
                        <button @click="showModal = true">
                            <svg class="mt-1 ml-1" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.523 5.208a.6.6 0 0 1 0 .847L19.27 7.308l-2.4-2.4 1.252-1.253a.6.6 0 0 1 .848 0l1.552 1.552v.001Zm-2.1 2.947-2.4-2.4-8.176 8.177a.6.6 0 0 0-.145.235l-.966 2.897a.3.3 0 0 0 .38.38l2.896-.967a.6.6 0 0 0 .235-.144l8.176-8.178Z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M3.12 19.08a1.8 1.8 0 0 0 1.8 1.8h13.2a1.8 1.8 0 0 0 1.8-1.8v-7.2a.6.6 0 1 0-1.2 0v7.2a.6.6 0 0 1-.6.6H4.92a.6.6 0 0 1-.6-.6V5.88a.6.6 0 0 1 .6-.6h7.8a.6.6 0 1 0 0-1.2h-7.8a1.8 1.8 0 0 0-1.8 1.8v13.2Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </form>
                    @include('modals.edit-post')
                </div>
            @endif
            {{-- End of delete option --}}
            <a href="{{ route('posts.degree', ['degree_name' => $post->degree_name]) }}"
                class="uppercase relative inline-block">
                <h1 class="text-3xl font-bold">
                    <span
                        class="animate-gradient text-transparent bg-clip-text hover:animate-gradient-hover transition duration-1000 ease-in-out">
                        {{ $post->degree_name }}
                    </span>
                </h1>
            </a>


        </div>

    </div>

    <h2 class=" mt-4 text-2xl"><b>{{ $post->title }}</b></h2>
    <p class=" text-justify my-2">{{ $post->content }}</p>
    {{-- comment field --}}
    <div class="border-t-2 border-blue-800 mt-4 py-2">
        <h1 class="font-bold">Comment</h1>

        @include('user.session-comment')

        @if ($post->comments->isEmpty())
            <p>No comments yet.</p>
        @else
            @foreach ($post->comments as $comment)
                <div class="my-3 bg-gray-700 shadow-lg text-white p-2 rounded-lg">
                    <div class="flex flex-row justify-between ">
                        <div class="flex flex-row items-center justify-center">
                            @if (!empty($comment->user->profile_picture))
                                <img class=" w-6  h-6  rounded-full bg-slate-200 object-cover"
                                    src="{{ asset($comment->user->profile_picture) }}"
                                    alt="profile pic">
                            @else
                                <img class="w-6  h-6  rounded-full bg-slate-200"
                                    src="{{ asset('imgs/default_profile.jpg') }}" alt="profile pic">
                            @endif
                            <a href="{{ route('user.show-profile', ['id' => $comment->user_id]) }}"
                                class="font-bold px-2 hover:underline">
                                <h4>{{ $comment->user->first_name }}
                                    {{ $comment->user->last_name }}</h4>
                            </a>

                        </div>
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="pt-3 pl-1">{{ $comment->comment_content }}</p>
                    <div class=" justify-start pl-1 flex flex-row">
                        <button> <small class="mx-1">Reply</small></button>
                        {{-- check if the comment is created by the authenticated acc --}}
                        @if ($comment->user_id === Auth::user()->id)
                            <div x-data="{ showModal: false }">
                                <form
                                    action="{{ route('comments.update', ['comment' => $comment->id]) }}"
                                    method="POST" class="inline" @submit.prevent="showModal = true">
                                    @csrf
                                    @method('PUT')
                                    <button @click="showModal = true"><small
                                            class="mx-1 hover:underline hover:text-blue-700">Edit</small></button>
                                </form>
                                @include('modals.edit-comment')
                            </div>
                            {{-- end if edit --}}
                            {{-- delete --}}
                            <div x-data="{ showModal: false }">
                                <form
                                    action="{{ route('comments.destroy', ['comment' => $comment->id]) }}"
                                    method="POST" class="inline" @submit.prevent="showModal = true">
                                    @csrf
                                    @method('DELETE')
                                    <button @click="showModal = true"><small
                                            class="mx-1 hover:underline hover:text-red-700">Delete</small></button>
                                </form>
                                @include('modals.delete-comment')
                            </div>
                        @endif
                        {{-- end of checking auth ID --}}
                    </div>
                </div>
            @endforeach
        @endif


        <form action=" {{ route('comments.store') }} " method="post">
            @csrf
            <div class=" grid grid-cols-6 gap-2">
                <input type="hidden" value="{{ $post->id }}" name="post_id">
                <input type="hidden" value="{{ $post->id }}" name="first_name">
                <x-textarea-input class="w-full h-12 esize-y overflow-y-auto my-1 col-span-5"
                    name="comment_content" placeholder="Add comment"></x-textarea-input>
                <div>
                    <x-primary-button
                        class="my-1 col-span-1 flex flex-row items-center justify-center max-h-16">
                        <span class=" lg:hidden">
                            <svg width="25" height="25" fill="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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