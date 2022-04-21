@hasrole('admin|superadmin|siswa')
    <x-menu :href="route('login')" :icon="'fas fa-home'" :text="'Dashboard'" :active="request()->is('home')" />
@endhasrole
@hasrole('admin|super admin')
    <x-menu :href="route('students.index')" :icon="'fas fa-user'" :text="'Siswa'" :active="request()->is('students')" />
    <x-menu :href="route('teachers.index')" :icon="'fas fa-building'" :text="'Guru'" :active="request()->is('teachers')" />
    <x-menu :href="route('pay.list', 'pendaftaran')" :icon="'fas fa-list'" :text="'Daftar pembayaran'" :active="request()->is('payment')" />
    <x-menu :href="route('grades.index')" :icon="'fas fa-building'" :text="'Kelola kelas'" :active="request()->is('grades')" />
    <x-menu :href="route('import.index')" :icon="'fas fa-solid fa-upload'" :text="'Import'" :active="request()->is('import')" />
    <x-menu :href="route('users.index')" :icon="'fas fa-user'" :text="'Kelola pengguna'" :active="request()->is('users')" />
@endhasrole
@hasrole('guru')
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Biodata
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('teachers.show', Auth::user()->teacher->id) }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data diri</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Riwayat pendidikan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kompetensi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pelatihan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengalaman kerja</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Riwayat mengajar</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Organisasi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambahan</p>
                </a>
            </li>
        </ul>
    </li>
@endrole
