@hasrole('admin|superadmin|siswa')
    <x-menu :href="route('login')" :icon="'fas fa-tachometer-alt'" :text="'Dashboard'" :active="request()->is('home')" />
@endhasrole
@hasrole('admin|super admin')
    <x-menu :href="route('students.index')" :icon="'fas fa-tachometer-alt'" :text="'Students'" :active="request()->is('students')" />
@endhasrole
