<div>
    <div class="text-sm flex mt-2">
        <span>Average rating: </span>
        <span class="text-white font-semibold rounded-md bg-indigo-500 px-2 ml-4">{{ $post->rating }}</span>
    </div>
    @auth
        <div class="flex items-center mt-0">
            <span class="text-sm">Your rating ({{ $userrating }}):</span>
            <div class="flex items-center ml-2">

                @for($i = 0; $i < $userrating; $i++)
                    <form method="post" wire:submit.prevent="rate($i)">
                        @csrf
                        <button>
                            <svg class="mx-1 w-4 h-4 fill-current text-green-400" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </button>
                    </form>
                @endfor

                @for($i = $userrating; $i < 5; $i++)
                    <form method="post" wire:submit.prevent="rate($i)">
                        @csrf
                        <button>
                            <svg class="mx-1 w-4 h-4 fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </button>
                    </form>
                @endfor

            </div>
        </div>
    @endauth
</div>
