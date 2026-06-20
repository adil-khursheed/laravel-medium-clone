<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 lg:px-6 py-6">
        <div class="flex justify-center py-3 bg-white shadow-sm rounded-xl">
            <x-category-tabs>
                No categories
            </x-category-tabs>
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