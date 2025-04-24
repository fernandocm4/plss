<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $timestamps = Carbon::now();
        DB::table('categorias')->insert([
            [
                'titulo_categoria' => 'Sistema',
                'created_at' => $timestamps,
                'updated_at' => $timestamps,
            ],
            [
                'titulo_categoria' => 'Computador',
                'created_at' => $timestamps,
                'updated_at' => $timestamps,
            ],
            [
                'titulo_categoria' => 'Periféricos',
                'created_at' => $timestamps,
                'updated_at' => $timestamps,
            ],
            [
                'titulo_categoria' => 'Internet',
                'created_at' => $timestamps,
                'updated_at' => $timestamps,
            ],
            [
                'titulo_categoria' => 'Outro',
                'created_at' => $timestamps,
                'updated_at' => $timestamps,
            ],
        ]);
    }
}
