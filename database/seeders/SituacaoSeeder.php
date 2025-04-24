<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $timestamps = Carbon::now();

        DB::table('situacoes')->insert([
            [
                'titulo_situacao' => 'Novo',
                'created_at' => $timestamps,
                'updated_at' => $timestamps,
            ],
            [
                'titulo_situacao' => 'Pendente',
                'created_at' => $timestamps,
                'updated_at' => $timestamps,
            ],
            [
                'titulo_situacao' => 'Resolvido',
                'created_at' => $timestamps,
                'updated_at' => $timestamps,
            ],
        ]);
    }
}
