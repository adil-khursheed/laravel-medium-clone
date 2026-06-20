<x-app-layout>
    <div class="py-6">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-col-reverse lg:flex-row gap-10">
                <div class="flex-1">
                    <h1 class="hidden lg:block text-2xl md:text-4xl lg:text-5xl font-bold mb-10">{{ $user->name }}</h1>

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

                <div class="w-full lg:w-80 lg:border-l border-gray-200 lg:pl-8 sticky top-20">
                    <x-follow-container :user="$user" class="flex flex-col items-start gap-5">

                        <div class="mt-4 space-y-2 px-2">
                            <x-user-avatar :user="$user" size="size-20 md:size-32" />

                            <h3 class="font-semibold text-xl">{{ $user->name }}</h3>
                            <div class="text-gray-400 text-lg capitalize">
                                <span x-text="followersCount"></span>
                                <span x-text="followersCount > 1 ? 'followers' : 'follower'"></span>
                            </div>
                            @if ($user->bio)
                                <p class="hidden lg:block">{{ $user->bio }}</p>
                            @endif

                            @if (auth()->user() && auth()->user()->id !== $user->id)
                                <div class="mt-4 hidden lg:block">
                                    <button @click="follow()" class="px-4 py-2 rounded-full cursor-pointer"
                                        x-text="following ? 'Unfollow' : 'Follow'"
                                        :class="following ? 'border border-red-600 hover:border-red-700 text-red-600 hover:text-red-700' : 'bg-emerald-600 hover:bg-emerald-700 text-white'"></button>
                                </div>
                            @endif
                        </div>

                        @if (auth()->user() && auth()->user()->id !== $user->id)
                            <div class="lg:hidden w-full">
                                <button @click="follow()" class="px-4 py-2 rounded-full cursor-pointer w-full"
                                    x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'border border-red-600 hover:border-red-700 text-red-600 hover:text-red-700' : 'bg-emerald-600 hover:bg-emerald-700 text-white'"></button>
                            </div>
                        @endif
                    </x-follow-container>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>