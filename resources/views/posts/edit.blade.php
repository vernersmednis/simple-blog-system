<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('posts.update', $post) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <x-input-label for="title" value="{{ __('Title') }}" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $post->title) }}" required />
                        <x-input-error :messages="$errors->get('title')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="body" value="{{ __('Body') }}" />
                        <textarea id="body" name="body" rows="10" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>{{ old('body', $post->body) }}</textarea>
                        <x-input-error :messages="$errors->get('body')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Update Post') }}
                        </button>
                    </div>
                </form>

                <form method="POST" action="{{ route('posts.destroy', $post) }}" class="mt-4" onsubmit="return confirm('{{ __('Are you sure you want to delete this post?') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Delete Post') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>