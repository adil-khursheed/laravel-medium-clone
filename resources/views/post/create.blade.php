<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-8">
                <form action="{{ route("post.create") }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div>
                        <x-input-label for="image" :value="__('Featured Image')" />
                        <x-text-input id="image" class="block mt-1 w-full h-11" type="file" name="image"
                            :value="old('image')" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Categories')" />
                        <select name="category_id" id="category_id"
                            class="block mt-1 w-full h-11 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3">
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full h-11" type="text" name="title"
                            :value="old('title')" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-text-area id="content" class="block mt-1 w-full" rows="10" name="content">
                            {{ old('content') }}
                        </x-text-area>
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