<x-app-layout>
    <div class="py-4 mt-5">
        <div class="max-w-3xl mx-auto px-4 lg:px-6">
            <h1 class="text-5xl font-bold mb-16">{{ $post->title }}</h1>

            <div class="flex items-center gap-5">
                <div>
                    @if ($post->user->avatar)
                        <img src="{{ $post->user->avatarUrl() }}" alt="{{ $post->user->name }}"
                            class="size-20 rounded-full object-cover object-top" />
                    @else
                        <img src="/user.png" alt="{{ $post->user->name }}" class="size-20 rounded-full object-cover" />
                    @endif
                </div>

                <div>
                    <h3 class="text-base font-medium">{{ $post->user->name }}</h3>
                    <div class="text-gray-500">
                        {{ $post->readTime() }} min read &middot; {{ $post->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>

            <x-clap-button />

            <div>
                <div class="my-10">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full rounded-lg" />
                </div>

                <div class="prose dark:prose-invert max-w-none text-lg text-gray-700 leading-relaxed">
                    {{ $post->content }}
                </div>
            </div>

            <div class="my-10">
                <span class="bg-gray-200 rounded-full px-5 py-3 text-base font-medium">
                    {{ $post->category->name }}
                </span>
            </div>

            <x-clap-button />
        </div>
    </div>
</x-app-layout>