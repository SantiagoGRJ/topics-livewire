<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @if (session()->has('autosaved'))
    <div class="text-green-600 text-sm mb-2">
        {{ session('autosaved') }}
    </div>
    @endif
    <form wire:submit="save" class="space-y-4">
        
        <div>
            <label for="title" class="block font-semibold">Title</label>
            <input 
                id="title" 
                type="text" 
                wire:model.blur="form.title" 
                wire:dirty.class="border-amber-500"
                class="border p-2 rounded w-full @error('form.title')
                    border-red-500
                    
                @enderror"
            >
            <div wire:dirty wire:target="form.title" class="text-sm text-yellow-600">
                Unsaved...
            </div>
            @error('form.title')
                <span class="error text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="content" class="block font-semibold">Content</label>
            <input 
                id="content" 
                type="text" 
                wire:model.blur="form.content" 
                wire:dirty.class="border-amber-500"
                class="border p-2 rounded w-full @error('form.content') border-red-500 @enderror"
            >
            <div wire:dirty wire:target="form.content" class="text-sm text-yellow-600">
                Unsaved...
            </div>
            
            @error('form.content')
                <span class="error text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

      
        <div class="flex items-center gap-4">
            <button 
                type="submit" 
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
            >
                Update
            </button>
            <span wire:loading class="text-gray-500">Saving...</span>
        </div>
    </form>
</div>
