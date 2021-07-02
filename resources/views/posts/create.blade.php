<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create a new blog post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('post.store') }}" method="post" class="p-6">
                    @csrf

                    <x-input-text :field="'title'" name="title" id="title" :value="old('title')">Title</x-input-text>
                    <x-input-textarea :field="'text'" name="text" id="text">Text</x-input-textarea>
                    <x-button>Create blog post</x-button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
