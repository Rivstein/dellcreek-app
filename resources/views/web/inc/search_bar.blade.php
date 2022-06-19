<div
    class="flex w-full items-center border border-gray-500 bg-gray-50 hover:bg-gray-100 px-4 py-2 rounded shadow focus-within:shadow-lg">
    <i class="fa-solid fa-magnifying-glass"></i>
    <form action="{{ route('properties.search') }}" method="GET">
        @csrf
        <input type="text" class="ml-4" name="query" placeholder="Search properties">
    </form>
</div>