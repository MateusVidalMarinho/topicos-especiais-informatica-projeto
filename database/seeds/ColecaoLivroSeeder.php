<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ColecaoLivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colecao_livro')->insert([
            'livro_id' => 1,
            'colecao_id' => 1,
        ]);
        DB::table('colecao_livro')->insert([
            'livro_id' => 2,
            'colecao_id' => 1,
        ]);
        DB::table('colecao_livro')->insert([
            'livro_id' => 3,
            'colecao_id' => 1,
        ]);
    }
}
