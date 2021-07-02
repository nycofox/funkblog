<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ADMIN - Approve post <span class="text-gray-400">{{ $post->title }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="font-semibold text-xl">{{ $post->title }}</h3>
                <h5>Posted by {{ $post->author->name }} {{ $post->created_at->diffForHumans() }}</h5>
                <div class="mb-6 text-gray-600 mt-4 text-lg">
                    {!! Str::markdown($post->text) !!}
                </div>
                <button class="px-4 py-2 bg-indigo-600 text-white font-semibold mr-2 rounded">Approve</button>
                <button class="px-4 py-2 bg-red-600 text-white font-semibold rounded">Delete</button>
            </div>
        </div>
    </div>
</x-app-layout>
