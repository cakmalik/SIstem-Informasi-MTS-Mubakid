<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WhatsappMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('database_settings')->insert([
            [
                'name'=>'wa_success_reg',
                'value'=>'"Assalamualaikum. Wr. Wb \n Terimakasih Ayah/Ibu yang telah melakukan registrasi untuk ananda #nama di MTs. Miftahul ulum 2 Banyaputih Kidul Jatiroto Lumajang. \n\nTerimakasih atas perhatiannya. \n\n_(Wa ini dikirim otomatis. untuk informasi lebih lanjut 081336163361)"',
            ],
        ]);
    }
}
