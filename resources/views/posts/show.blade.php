<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-5xl font-bold text-gray-900 mb-2">
                    {{ $post->title }}
                </h1>
                <div class="mb-2">
                    <p class="text-sm text-gray-600">
                        {{ $post->user->name }} • {{ $post->created_at->format('M d, Y') }}
                    </p>
                </div>

                @if($post->categories->count() > 0)
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($post->categories as $category)
                            <span class="inline-block bg-indigo-500/10 text-indigo-700 text-sm font-semibold px-2.5 py-0.5 rounded-full">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $post->body }}
                </div>

                <!-- Comments Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Comments') }}</h3>

                    @auth
                        <form method="POST" action="{{ route('posts.comments.store', $post) }}" class="mb-6">
                            @csrf
                            <div class="mb-4">
                                <x-input-label for="body" value="{{ __('Add a comment') }}" />
                                <textarea id="body" name="body" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>{{ old('body') }}</textarea>
                                <x-input-error :messages="$errors->get('body')" />
                            </div>
                            <x-primary-button>
                                {{ __('Post Comment') }}
                            </x-primary-button>
                        </form>
                    @endauth

                    @guest
                        <p class="text-gray-600 mb-4">{{ __('Please') }} <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">{{ __('log in') }}</a> {{ __('to leave a comment.') }}</p>
                    @endguest

                    @if($post->comments->count() > 0)
                        <div class="space-y-4">
                            @foreach($post->comments as $comment)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm text-gray-600 mb-1">
                                                {{ $comment->user->name }} • {{ $comment->created_at->format('M d, Y') }}
                                            </p>
                                            <p class="text-gray-800 break-words">{{ $comment->body }}</p>
                                        </div>
                                        @can('delete', $comment)
                                            <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="ml-4" onsubmit="return confirm('{{ __('Are you sure you want to delete this comment?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">{{ __('No comments yet.') }}</p>
                    @endif
                </div>

                <div class="mt-6 flex gap-4 text-sm">
                    <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                        {{ __('← Back to posts') }}
                    </a>
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            {{ __('Edit') }}
                        </a>
                        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this post?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
