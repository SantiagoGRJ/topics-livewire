<div class="p-6 bg-white rounded-xl shadow-lg max-w-lg mx-auto mt-6">
    {{-- Mensaje de sesión --}}
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit="save" class="space-y-6">
      
        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
            <input 
                type="text" 
                wire:model="form.title" 
                id="title" 
                placeholder="Ingrese el título"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
            >
            @error('form.title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

      
        <div>
            <label for="content" class="block text-gray-700 font-semibold mb-2">Content:</label>
            <input 
                type="text" 
                wire:model="form.content" 
                id="content" 
                placeholder="Ingrese el contenido"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
            >
            @error('form.content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        
        <div class="flex items-center justify-between">
            <button 
                wire:loading.class="opacity-50"
                wire:loading.attr="disabled"
                type="submit" 
                class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 transition"
            >
                Save
            </button>
            <span wire:loading class="text-gray-500 italic">Saving...</span>
        </div>
    </form>
</div>
