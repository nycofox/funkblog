<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }} <span class="text-lg text-gray-500">by <a href="#">{{ $post->author->name }}</a></span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('posts._post')
        </div>
    </div>
</x-app-layout>
