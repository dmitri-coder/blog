@extends('partials.layout')
@section('content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-8">Posts tagged with "{{ $tag->name }}"</h1>

        @if($posts->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <div class="card border border-gray-200 rounded-lg hover:shadow-2xl transition-shadow duration-300 bg-white">
                        <div class="card-body p-6">
                            <h2 class="card-title text-lg font-bold text-gray-900">
                                <a href="{{ route('post', $post->slug) }}" class="text-indigo-600 hover:underline">{{ $post->title }}</a>
                            </h2>
                            <p class="mt-4 text-gray-700">{{ Str::limit($post->body, 100) }}</p>
                            <div class="flex justify-between items-center mt-6 text-sm text-gray-500">
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                                <span>{{ $post->comments_count }} comments</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 flex justify-center">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-center text-gray-600">No posts found for this tag.</p>
        @endif
    </div>
@endsection
