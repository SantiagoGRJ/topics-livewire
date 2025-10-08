<div class="p-6 bg-gray-50 rounded-lg shadow-md">
    {{-- Mensaje de sesión --}}
  @if (session('status'))
        <span class="text-green-500 font-semibold mb-4 block">{{ session('status') }}</span>
    @endif
    {{-- Barra superior: botón crear + búsqueda --}}
    <div class="mb-4 flex justify-between items-center">
        {{-- Botón Crear --}}
        <a 
            href="{{ route('posts.create') }}" 
            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition"
        >
            Crear Post
        </a>

        {{-- Input de búsqueda --}}
        <input 
            type="text" 
            wire:model.live="search" 
            placeholder="Buscar post..." 
            class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
    </div>

    {{-- Tabla de posts --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-2 px-4">Id</th>
                    <th class="py-2 px-4">Title</th>
                    <th class="py-2 px-4">Content</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr class="text-center border-t border-gray-200 hover:bg-gray-100">
                        <td class="py-2 px-4">{{ $post->id }}</td>
                        <td class="py-2 px-4">{{ $post->title }}</td>
                        <td class="py-2 px-4">{{ $post->content }}</td>
                        <td class="py-2 px-4 space-x-2">
                            <button 
                                wire:click="delete({{ $post->id }})" 
                                wire:confirm="¿Estás seguro que quieres eliminar este post?" 
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                            >Eliminar</button> 
                            <a 
                                href="{{ route('posts.update', $post->id) }}" 
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition"
                            >Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-4">No se encontraron posts.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
    <div wire:offline>
    This device is currently offline.
</div>
</div>

