<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ADMIN - Posts pending approval
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @forelse($posts as $post)
                    <div>
                        <a href="{{ route('admin.post', $post) }}" class="font-semibold text-lg">{{ $post->title }}</a>
                        {{ $post->author->name }}
                        posted {{ $post->created_at->diffForHumans() }}
                    </div>
                @empty
                    <p>No posts are currently awaiting approval, have a nice cup of coffee!</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
