@if (session('commentDeleted'))
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
        class="text-white w-full p-2 mt-2 bg-green-700 rounded-lg mb-2 font-bold text-center">
        {{ session('commentDeleted') }}</p>
@elseif (session('commentCreated'))
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
        class="text-white w-full p-2 mt-2 bg-green-700 rounded-lg mb-2 font-bold text-center">
        {{ session('commentCreated') }}</p>
@elseif (session('commentEditSuccess'))
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
        class="text-white w-full p-2 mt-2 bg-green-700 rounded-lg mb-2 font-bold text-center">
        {{ session('commentEditSuccess') }}</p>
@elseif (session('replyUpdated'))
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
        class="text-white w-full p-2 mt-2 bg-green-700 rounded-lg mb-2 font-bold text-center">
        {{ session('replyUpdated') }}</p>
@endif
