<div class="flex flex-col-reverse md:flex-row bg-white rounded-xl shadow-sm overflow-hidden">
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
        <x-primary-button>
            <a href="{{ route("post.show", ["username" => $post->user->username, "post" => $post->slug]) }}"
                class="flex items-center">
                Read more
                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </x-primary-button>
    </div>
    <div>
        <img class="md:rounded-r-xl w-full md:w-80 h-full object-cover" src="{{ Storage::url($post->image) }}" alt="" />
    </div>
</div>