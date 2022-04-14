<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                'name'=>'super admin',
                'email'=>'m@m.m',
                'password'=>bcrypt('password'),
                ]
            );
        $user->assignRole('super admin');
        $user->assignRole('admin');
        
        $user = User::create(
                [
                'name'=>'admin',
                'email'=>'mtsmu2@bakid.com',
                'password'=>bcrypt('p455w0rd'),
                ]
            );
        $user->assignRole('admin');
    }
}
