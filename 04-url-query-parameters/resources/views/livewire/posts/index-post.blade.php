<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <input 
    type="text" 
    wire:model.live="query"
    class="border rounded-md border-black px-2 py-1 focus:outline-blue-500"
    >

    <ul>
        @foreach ($posts as $post)
            <li wire:key="{{ $post->id }}"> {{ $post->title }} </li>
        @endforeach
    </ul>
</div>
