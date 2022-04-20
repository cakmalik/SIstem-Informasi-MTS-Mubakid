<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $putra = ['A','B','C','D','E','F','G','H','I','J'];
        $putri = ['K','L','M','N','O'];
        
        for($i=0;$i<count($putra);$i++){
            DB::table('grades')->insert([
                'name' => '7'. $putra[$i],
                'description' => 'Rombel Putra '.$i+1,
                'qty' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        for ($i=0;$i<count($putri);$i++){
            DB::table('grades')->insert([
                'name' => '7'. $putri[$i],
                'description' => 'Rombel Putri '.$i+1,
                'qty' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
