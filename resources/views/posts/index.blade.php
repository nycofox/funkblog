<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Latest posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @forelse($posts as $post)
                @include('posts._post')
            @empty
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p class="p-6">Looks like there are no posts yet, why don't you
                        <a href="{{ route('post.create') }}" class="font-semibold">write</a> one?
                    </p>
                </div>
            @endforelse
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
