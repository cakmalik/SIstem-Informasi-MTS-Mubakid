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
