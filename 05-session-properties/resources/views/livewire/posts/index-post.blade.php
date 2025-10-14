<div>
    {{-- In work, do what you enjoy. --}}
    <div class="mb-4">
        <input 
        type="text"
        wire:model.live="search"
        class="border border-gray-600 focus:outline-blue-500 px-2 py-1 rounded-md"
        >
    </div>

    <div class="">
        <ul>
            @foreach ($posts as $post)
                <li wire:key={{ $post->id }}>{{ $post->id }} - {{ $post->title }}</li>
            @endforeach
        </ul>
    </div>
   
        <div class="mt-4">
        {{ $posts->links() }}
    </div>
   
</div>
