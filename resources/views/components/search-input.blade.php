<!-- Search Box -->
<div class="flex items-center justify-center p-4">
    <form action="{{ route('search-title') }}" method="GET"
        class="align-content-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2">
        <x-text-input type="text" name="query" placeholder="Search"
            class="col-span-1 sm:col-span-2 px-3 py-2 border border-gray-300 focus:outline-none rounded-md" />
        <button type="submit"
            class="col-span-1 sm:col-span-2 md:col-span-1 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 focus:outline-none">
            Search
        </button>
    </form>
</div>