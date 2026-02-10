<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="title" value="{{ __('Title') }}" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title') }}" required />
                        <x-input-error :messages="$errors->get('title')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="body" value="{{ __('Body') }}" />
                        <textarea id="body" name="body" rows="10" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>{{ old('body') }}</textarea>
                        <x-input-error :messages="$errors->get('body')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label value="{{ __('Categories') }}" />
                        @foreach($categories as $category)
                            <label class="inline-flex items-center mr-4">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                <span class="ml-2">{{ $category->name }}</span>
                            </label>
                        @endforeach
                        <x-input-error :messages="$errors->get('categories')" />
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Create Post') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>