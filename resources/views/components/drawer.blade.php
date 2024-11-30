<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        {{ $slot }}
    </div>
    <div class="drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>

        <ul class="menu bg-base-200 rounded-box w-80 h-full p-10">
            {{-- Judul App --}}
            <div class="mb-5">
                <span class="font-extrabold text-3xl"> <i class="ri-graduation-cap-line text-4xl"></i> AbsensiApp</span>
            </div>
            {{-- Menu --}}
            <li>
                <details {{ Request::is('master/*') ? 'open' : '' }}>
                    <summary class="text-2xl font-bold ">Master</summary>
                    <ul>
                        <li><a href="{{ route('master-kelas.index') }}"
                                class="text-xl {{ Request::is('master/kelas*') ? 'active' : '' }}">Kelas</a></li>
                        <li><a href="#" class="text-xl ">Murid</a></li>
                    </ul>
                </details>
            </li>

        </ul>
    </div>
</div>
