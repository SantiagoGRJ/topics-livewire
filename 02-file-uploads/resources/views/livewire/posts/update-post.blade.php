<div  class="max-w-lg mx-auto mt-10 bg-white shadow-lg rounded-lg p-6 border border-gray-200">
    {{-- Do your work, then step back. --}}

    <form wire:submit="save" enctype="multipart/form-data" class="space-y-4">
        
        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-1">Título</label>
            <input 
                type="text" 
                wire:model="form.title" 
                id="title" 
                class="w-full border @error('form.title') border-red-500 @else border-gray-300 @enderror rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Escribe el título aquí..."
            >
            @error('form.title')
                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="content" class="block text-gray-700 font-semibold mb-1">Contenido</label>
            <textarea 
                wire:model="form.content" 
                id="content" 
                rows="3"
                class="w-full border @error('form.content') border-red-500 @else border-gray-300 @enderror rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Escribe el contenido aquí..."
            ></textarea>
            @error('form.content')
                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        @if ($form->image)
        @if (is_string($form->image))
            <div class="mt-3">
                <img src="{{ Storage::url('photos/'.$form->image)   }}" alt="Vista previa" class="rounded-md shadow-md max-h-48 object-cover">
            </div>
        @else
            <div class="mt-3">
                <img src="{{ $form->image->temporaryUrl()  }}" alt="Vista previa" class="rounded-md shadow-md max-h-48 object-cover">
            </div>
        @endif
            
        @endif

        <div 
            x-data="{ uploading: false, progress: 0 }"
            x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false"
            x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
            class="mt-4"
        >
            <label class="block text-gray-700 font-semibold mb-1">Imagen</label>
            <input 
                type="file" 
                wire:model="form.image"
                class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100"
            >
            @error('form.image')
                <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
            @enderror

            <div x-show="uploading" class="mt-2">
                <progress max="100" x-bind:value="progress" class="w-full h-2 rounded bg-gray-200"></progress>
            </div>
        </div>

        <div wire:loading wire:target="form.image" class="text-sm text-gray-500 mt-2">
            Subiendo imagen...
        </div>

        <div class="pt-4">
            <button 
                type="submit"
                wire:loading.attr="disabled"
                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                Guardar
            </button>
        </div>

    </form>
</div>
