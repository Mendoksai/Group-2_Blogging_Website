@if (session('postDone'))
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
        class="text-white w-full p-2 mt-2 bg-blue-700 rounded-lg mb-2 font-bold text-center">
        {{ session('postDone') }}
    </p>
    @elseif (session('postDeleted'))
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
            class="text-white w-full p-2 mt-2 bg-blue-700 rounded-lg mb-2 font-bold text-center">
            {{ session('postDeleted') }}
        </p>
    @elseif (session('postUpdate'))
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
            class="text-white w-full p-2 mt-2 bg-blue-700 rounded-lg mb-2 font-bold text-center">
            {{ session('postUpdate') }}
        </p>
    @endif
