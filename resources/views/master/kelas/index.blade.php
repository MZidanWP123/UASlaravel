<x-layout>
    <x-slot:judul>{{ $judul }}</x-slot>

    @if (session('error'))
        <div class="alert alert-error shadow-lg flex justify-between my-5">
            <div>
                <span>{{ session('error') }}</span>
            </div>
            <button class="btn btn-ghost btn-sm ml-2" onclick="this.closest('.alert').remove();">×</button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success shadow-lg flex justify-between my-5">
            <div>
                <span>{{ session('success') }}</span>
            </div>
            <button class="btn btn-ghost btn-sm ml-2 text-2xl" onclick="this.closest('.alert').remove();">×</button>
        </div>
    @endif


    <div class="bg-white shadow-lg rounded-lg p-5 ">
        <div class="mb-5">
            <a href="{{ Route('master-kelas.add') }}" class="btn btn-accent text-white text-xl"> <i
                    class="ri-add-circle-line text-2xl"></i></i> Tambah
                Kelas
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full border-2 border-gray-300">

                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b border-l border-r text-xl">Nama Kelas</th>
                        <th class="px-4 py-2 border-b border-l border-r text-xl">Tanggal Buat</th>
                        <th class="px-4 py-2 border-b border-l border-r text-xl">Aksi</th>

                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            {{-- <td class="px-4 py-2 border-t">{{ $item->id }}</td> --}}
                            <td class="px-4 py-2 border-t text-lg">{{ $item->nama_kelas }}</td>
                            <td class="px-4 py-2 border-t text-lg">{{ $item->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 border-t text-lg">
                                <div class="grid grid-cols-2">
                                    <a href="{{ route('master-kelas.view', ['id' => $item->id]) }}"><i
                                            class="ri-edit-2-line text-xl text-yellow-400"></i> </a>
                                    <a href="{{ route('master-kelas.delete', ['id' => $item->id]) }}"><i
                                            class="ri-delete-bin-3-line text-xl text-red-400"></i></a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="italic font-bold text-center text-2xl"> Belum ada data ! </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Tailwind Pagination -->
        <div class="mt-4">
            {{ $data->links('pagination::tailwind') }}
        </div>
    </div>



</x-layout>
