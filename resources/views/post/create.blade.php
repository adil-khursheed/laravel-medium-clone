<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-8">
                <form action="{{ route("post.create") }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div>

                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full h-11" type="file" name="image"
                            :value="old('image')" required autofocus />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />

                    </div>

                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full h-11" type="text" name="title"
                            :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-text-area id="content" class="block mt-1 w-full h-11" name="content" :value="old('content')"
                            required />
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-primary-button>
                            Submit
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>