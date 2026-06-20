<x-app-layout>
    <div class="py-4 mt-5">
        <div class="max-w-3xl mx-auto px-4 lg:px-6">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-8 md:mb-12 lg:mb-16">{{ $post->title }}</h1>

            <div class="flex items-center gap-5">
                <div>
                    <x-user-avatar :user="$post->user" />
                </div>

                <div>
                    <x-follow-container :user="$post->user" class="flex items-center gap-3">
                        <a href="{{ route("profile.show", $post->user) }}"
                            class="text-base font-medium hover:underline">
                            {{ $post->user->name }}
                        </a>

                        @if (auth()->user() && auth()->user()->id !== $post->user->id)

                            &middot;

                            <button @click="follow()" x-text="following ? 'Unfollow' : 'Follow'"
                                class="cursor-pointer text-base"
                                :class="following ? 'text-red-600 hover:text-red-700' : 'text-emerald-600 hover:text-emerald-700'">
                            </button>
                        @endif
                    </x-follow-container>

                    <div class="text-gray-500">
                        {{ $post->readTime() }} min read &middot; {{ $post->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>

            <x-clap-button :post="$post" />

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

            <x-clap-button :post="$post" />
        </div>
    </div>
</x-app-layout>