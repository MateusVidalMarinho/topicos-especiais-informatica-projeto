<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ColecaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colecoes')->insert([
            'title' => 'Colecaozinha ',
            'description' => Str::random(60),
            'slug' => 'colecaozinha',
            'user_id' => 1,
        ]);
        DB::table('colecoes')->insert([
            'title' => 'Colecaozinha 2',
            'description' => Str::random(60),
            'slug' => 'colecao2',
            'user_id' => 1,
        ]);
    }
}
