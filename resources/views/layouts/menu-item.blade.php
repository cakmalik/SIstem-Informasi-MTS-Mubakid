@hasrole('admin|superadmin|siswa')
    <x-menu :href="route('login')" :icon="'fas fa-home'" :text="'Dashboard'" :active="request()->is('home')" />
@endhasrole
@hasrole('admin|super admin')
    <x-menu :href="route('students.index')" :icon="'fas fa-user'" :text="'Students'" :active="request()->is('students')" />
    <x-menu :href="route('import.index')" :icon="'fas fa-solid fa-upload'" :text="'Import'" :active="request()->is('import')" />
    <x-menu :href="route('users.index')" :icon="'fas fa-user'" :text="'Users'" :active="request()->is('users')" />
@endhasrole
