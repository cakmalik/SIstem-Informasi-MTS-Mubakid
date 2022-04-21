<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'siswa']);
        Role::create(['name' => 'guest']);
        Role::create(['name' => 'guru']);
        $this->call(UserSeeder::class);
        $this->call(BillTypeSeeder::class);
        $this->call(DatabaseSettingSeeder::class);
        $this->call(GradeSeeder::class);
    }
}
