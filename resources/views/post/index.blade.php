<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 lg:px-6 py-6">
        <div class="flex justify-center py-3 bg-white shadow-sm rounded-xl">
            @if($categories->isEmpty())
                <p class="text-gray-500 mt-2">No Categories!</p>
            @else
                <ul class="flex flex-wrap text-sm font-medium text-center text-body">
                    <li class="me-2">
                        <a href="#" class="inline-block px-4 py-2.5 bg-brand rounded-base active"
                            aria-current="page">All</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="me-2">
                            <a href="#" class="inline-block px-4 py-2.5 bg-brand rounded-base">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex flex-col gap-5 mt-5">
            @forelse ($posts as $post)
                <x-post-item :post="$post" />
            @empty
                <div class="text-center text-lg font-medium text-gray-400 py-16 capitalize">
                    no post found
                </div>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $posts->onEachSide(1)->links() }}
        </div>
    </div>
</x-app-layout>