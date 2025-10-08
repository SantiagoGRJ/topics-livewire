<div class="p-8">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Lista de Publicaciones</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            <i class="i-tabler-plus mr-2"></i> Crear nuevo post
        </a>
    </div>

    {{-- Tabla --}}
    <div class="card shadow-md border border-gray-200">
        <div class="card-body p-0 overflow-x-auto">
            <table class="table w-full">
                <thead class="bg-gray-50 text-gray-700 uppercase text-sm font-semibold">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Título</th>
                        <th class="px-4 py-3 text-left">Contenido</th>
                        <th class="px-4 py-3 text-left">Imagen</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 divide-y">
                    @foreach ($posts as $post)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $post->id }}</td>
                            <td class="px-4 py-3">{{ $post->title }}</td>
                            <td class="px-4 py-3 max-w-xs truncate">{{ $post->content }}</td>
                            <td class="px-4 py-3">
                                @if ($post->image)
                                    <img src="{{ Storage::url('photos/' . $post->image) }}" 
                                         alt="Post Image" 
                                         class="w-20 h-20 object-cover rounded-lg border border-gray-200 shadow-sm">
                                @else
                                    <span class="text-gray-400 italic">Sin imagen</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-primary text-blue-500">
                                       Editar
                                    </a>
                                        <button 
                                        wire:click="delete({{$post}})" 
                                        wire:confirm="are you sure?"
                                        type="button" 
                                        class="btn btn-sm btn-outline-error text-red-500">
                                            Eliminar
                                        </button>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
