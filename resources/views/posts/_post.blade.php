<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-4">
    <h4>
        <a href="{{ route('post.show', $post) }}" class="font-semibold text-lg">{{ $post->title }}</a>
    </h4>
    <div class="text-gray-500 mb-4">
        by <a class="font-semibold" href="#">{{ $post->author->name }}</a>
        posted {{ $post->created_at->diffForHumans() }}
    </div>
    <div class="mb-6 text-gray-600 mt-4 text-lg">
        {!! Str::markdown($post->text) !!}
    </div>
    <div>
        <livewire:rating :post="$post" />
    </div>
</div>
