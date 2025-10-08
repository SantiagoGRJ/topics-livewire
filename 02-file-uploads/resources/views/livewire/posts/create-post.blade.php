<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form wire:submit="save">
        <label for="">Title</label>
        <input type="text" wire:model="form.title" id="" class="border @error('form.title') border-red-500 @enderror px-2 py-1">
        @error('form.title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>
        <label for="">Content</label>
        <input type="text" wire:model="form.content" id="" class="border  @error('form.content')
            border-red-500
        @enderror px-2 py-1 mt-2" >
        @error('form.content')
            <span class="text-red-500">  {{ $message }}</span>
        @enderror
        <br>
        <button 
        type="submit"
        wire:loading.attr="disabled">
        <span wire:loading.remove>Guardar</span>
        <span wire:loading wire:target="save" >Guardando...</span>
    </button>
       
    </form>
</div>
