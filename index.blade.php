<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Developer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('developer.create') }}" 
               class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
               Tambah Developer
            </a>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($developers->isEmpty())
                        <p class="text-center text-gray-500">Belum ada data developer.</p>
                    @else
                        <table class="table-auto w-full border border-collapse border-gray-300">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="border px-4 py-2">Nama Developer</th>
                                    <th class="border px-4 py-2">Negara</th>
                                    <th class="border px-4 py-2">Tahun Berdiri</th>
                                    <th class="border px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($developers as $developer)
                                    <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-900">
                                        <td class="border px-4 py-2">{{ $developer->nama_developer }}</td>
                                        <td class="border px-4 py-2">{{ $developer->negara }}</td>
                                        <td class="border px-4 py-2">{{ $developer->tahun_berdiri }}</td>
                                        <td class="border px-4 py-2 whitespace-nowrap">
                                            <a href="{{ route('developer.edit', $developer->id_developer) }}" 
                                               class="text-blue-600 hover:underline mr-2">Edit</a>

                                            <form action="{{ route('developer.destroy', $developer->id_developer) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="text-red-600 hover:underline"
                                                    onclick="return confirm('Yakin ingin menghapus developer ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
