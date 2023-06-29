@php
    use Carbon\Carbon;
@endphp
<x-app-layout>

    <div class="pb-10 pt-2 px-4 sm:px-10">
        <div class="max-w-4xl mx-auto">
            <div class="overflow-hidden shadow-sm rounded-lg">
                <div class=" m-2 text-gray-900 dark:text-gray-100">
                </div>

                @include('user.session-info')
                @include('user.create-post')

                {{-- this is the search main --}}
                <div class="flex items-center justify-center mt-20">
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <h1 class="p-1 text-center text-white font-bold text-2xl shadow-lg">Search title post</h1>
                        @include('components.search-input')
                    </div>
                </div>
                
                


            </div>
        </div>
    </div>
</x-app-layout>
