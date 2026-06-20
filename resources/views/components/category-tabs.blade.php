<ul class="flex flex-wrap text-sm font-medium text-center justify-center px-3">
    <li class="me-2">
        <a href="{{ route('dashboard') }}"
            class="{{ Route::currentRouteNamed('dashboard') ? 'bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 text-white' : 'text-gray-800 hover:bg-gray-200' }} inline-block px-4 py-2 rounded-full"
            aria-current="page">All</a>
    </li>
    @forelse ($categories as $category)
        <li class="me-2">
            <a href="{{ route('post.byCategory', $category) }}"
                class="{{ Route::currentRouteNamed('post.byCategory') && request('category')->id == $category->id ? 'bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 text-white' : 'text-gray-800 hover:bg-gray-200' }} inline-block px-4 py-2 rounded-full"
                aria-current="page">{{ $category->name }}</a>
        </li>
    @empty
        <li class="me-2">
            {{ $slot }}
        </li>
    @endforelse
</ul>