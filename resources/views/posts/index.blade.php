<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Posts') }}
            </h2>
            <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Create New Post') }}
            </a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 mx-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <form method="GET" action="{{ route('posts.index') }}" class="mt-4">
                <div class="flex">
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="{{ __('Search posts...') }}" class="flex-1 rounded-l-md border-r-0" />
                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-r-md">
                        {{ __('Search') }}
                    </button>
                </div>
            </form>
        
            @if($posts->hasPages())
                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            @endif

            @if($posts->count() > 0)
                <div class="space-y-6">
                    @foreach($posts as $post)
                        <article class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200 last:border-b-0">
                            <div class="mb-3">
                                <p class="text-sm text-gray-600">
                                    {{ $post->user->name }} • {{ $post->created_at->format('M d, Y') }}
                                </p>
                            </div>
                            
                            <h2 class="text-2xl font-bold text-gray-900 mb-3">
                                {{ $post->title }}
                            </h2>
                            
                            <p class="text-gray-700 mb-4 leading-relaxed">
                                {{ Str::limit($post->body, 200) }}
                            </p>

                            @if($post->categories->count() > 0)
                                <div class="mb-4">
                                    <p class="text-sm text-gray-600">
                                        {{ __('Categories:') }} {{ $post->categories->pluck('name')->join(', ') }}
                                    </p>
                                </div>
                            @endif
                            
                            <div class="flex gap-4 text-sm">
                                <a href="{{ route('posts.show', $post) }}" class="text-green-600 hover:text-green-800 font-medium">
                                    {{ __('Read more') }}
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
                        </article>
                    @endforeach
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center text-gray-500">
                        <p>{{ __('No posts have been created yet.') }}</p>
                    </div>
                </div>
            @endif
            
            @if($posts->hasPages())
                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>