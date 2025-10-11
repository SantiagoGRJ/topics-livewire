<div class="p-4 bg-white rounded-md shadow-md">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    <div class="mb-4">
        <form wire:submit="search" class="flex items-center gap-2">
            <div class="flex-1">
                <label for="search" class="block text-sm font-semibold text-gray-700 mb-1">
                    Buscar publicaciones:
                </label>
                <input id="search" type="text" wire:model="query" placeholder="Escribe para buscar..."
                    class="w-full border border-gray-400 focus:border-blue-500 rounded-md px-3 py-2 outline-none transition">
            </div>

            <button type="submit"
                class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md transition">
                Buscar
            </button>
        </form>
    </div>



    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm text-center">
            <thead class="bg-gray-100 text-gray-800">
                <tr>
                    <th class="px-4 py-2 border border-gray-300">ID</th>
                    <th class="px-4 py-2 border border-gray-300">Título</th>
                    <th class="px-4 py-2 border border-gray-300">Contenido</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border border-gray-300">{{ $post->id }}</td>
                    <td class="px-4 py-2 border border-gray-300 font-medium text-gray-700">{{ $post->title }}</td>
                    <td class="px-4 py-2 border border-gray-300 text-gray-600">{{ $post->content }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-4 text-gray-500 italic">
                        No hay publicaciones disponibles
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>