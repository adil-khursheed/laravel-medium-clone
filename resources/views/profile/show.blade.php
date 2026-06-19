<x-app-layout>
    <div class="py-6">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="flex gap-10">
                <div class="flex-1">
                    <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-10">{{ $user->name }}</h1>

                    <div class="space-y-6">
                        @forelse ($posts as $post)
                            <x-post-item :post="$post" />
                        @empty
                            <div class="text-center text-lg font-medium text-gray-400 py-16 capitalize">
                                no post found
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="w-80 border-l border-gray-200 pl-8 sticky top-20">
                    <div>
                        <x-user-avatar :user="$user" size="size-20 md:size-32" />

                        <div>
                            <h3>{{ $user->name }}</h3>
                            <p>{{ $user->bio }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>