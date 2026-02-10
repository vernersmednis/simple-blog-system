<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <p class="text-sm text-gray-600">
                        {{ $post->user->name }} • {{ $post->created_at->format('M d, Y') }}
                    </p>
                </div>

                <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $post->body }}
                </div>

                <div class="mt-6 flex gap-4 text-sm">
                    <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                        {{ __('← Back to posts') }}
                    </a>
                    @if($post->user_id === auth()->id())
                        <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            {{ __('Edit') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
