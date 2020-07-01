<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            DB::table('categorias')->insert([
                'title' => 'Categoria ' . $i,
                'description' => 'aaaaa',
                'slug' => 'a' . $i,
            ]);
        }
    }
}
