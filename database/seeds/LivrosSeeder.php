<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LivrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            DB::table('livros')->insert([
                'title' => 'Livro ' . $i,
                'description' => Str::random(10) . '@gmail.com',
                'slug' => 'livro-' . $i,
                'pages' => rand(1, 10),
                'picture' => Str::random(10) . '@gmail.com',
                'author' => Str::random(10) . '@gmail.com',
                'categoria_id' => 1,
                'published_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
