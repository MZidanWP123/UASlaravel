<x-layout>
    <x-slot:judul>{{ $judul }}</x-slot>
    <div class="bg-white shadow-lg rounded-lg p-5 ">
        <div class="grid grid-cols-1 sm:grid-cols-4 ">
            <div class="bg-slate-100 rounded-lg p-3 col-span-2">
                <form method="POST" action="{{ route('master-kelas.update', ['id' => $data->id]) }}" class="p-2">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text text-xl">Nama Kelas <span
                                        class="text-red-500 text-xl">*</span></span>
                            </div>
                            <input type="text" placeholder="" id="nama_kelas" name="nama_kelas" required
                                class="input input-bordered w-full max-w-md" value="{{ $data->nama_kelas }}" />
                            @error('nama_kelas')
                                <span class="text-error">{{ $message }}</span>
                            @enderror

                        </label>
                    </div>

                    <div class="flex flex-row-reverse gap-4 mt-3 sm:mt-0 ">
                        <div>
                            <button class="btn btn-primary" type="submit"> Simpan </button>
                            <a class="btn btn-neutral" href="{{ Route('master-kelas.index') }}"> Kembali</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>

</x-layout>
