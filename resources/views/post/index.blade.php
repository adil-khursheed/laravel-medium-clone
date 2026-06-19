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
                        <div class="flex bg-white rounded-xl shadow-sm overflow-hidden">
                            <div class="flex-1 p-4 lg:p-6">
                                <a href="{{ route("post.show", [
                    "username" => $post->user->username,
                    "post" => $post->slug
                ]) 
                                                                        }}">
                                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-heading">{{ $post->title }}
                                    </h5>
                                </a>
                                <p class="mb-6 text-body">{{ Str::words($post->content, 30) }}</p>
                                <a href="{{ route("post.show", ["username" => $post->user->username, "post" => $post->slug]) }}">
                                    <x-primary-button>
                                        Read more
                                        <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                        </svg>
                                    </x-primary-button>
                                </a>
                            </div>
                            <div>
                                <img class="rounded-r-xl w-80 h-full object-cover" src="{{ Storage::url($post->image) }}" alt="" />
                            </div>
                        </div>
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