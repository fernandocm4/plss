<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Chamado;
use Illuminate\Support\Facades\DB;

class ChamadoController extends Controller
{


    public function home() {

        $chamados = DB::table('chamados')
            ->whereNotNull('data_solucao')
            ->whereRaw('data_solucao::date > prazo_solucao::date')
            ->whereRaw('date_part(\'month\', data_solucao) = ?', [Carbon::now()->month])->count();

        $todos_chamados_mes = DB::table('chamados')
        ->whereRaw('date_part(\'month\', data_solucao) = ?', [Carbon::now()->month])->count();

        $todos_chamados = DB::table('chamados')->count();

        $chamados_atrasados = ($chamados * 100) / $todos_chamados_mes;

        return view('home', ['chamado' => $chamados_atrasados, 'todosmes'=>$todos_chamados_mes, 'chamados'=>$chamados, 'todos'=>$todos_chamados]);

    }

    public function index()
    {
        $dataAtual = Carbon::now()->format('Y-m-d');
        $prazoSolucao = Carbon::now()->addDays(3)->format('Y-m-d');

        return view('criar_chamado', [
            'dataCriacao' => $dataAtual,
            'dataPrazo' => $prazoSolucao,
        ]);
    }

    public function criar(Request $request) {
        $chamado = new Chamado;

        /* 
            $table->string('descricao');
            $table->string('categoria');

            $table->string('situacao');
            $table->datetime('prazo_solucao');
            $table->datetime('data_criacao');
            $table->datetime('data_solucao')->nullable();
        */

        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->categoria = $request->categoria;

        $chamado->situacao = $request->situacao;
        $chamado->prazo_solucao = $request->prazoSolucao;
        $chamado->data_criacao = $request->dataCriacao;
        $chamado->data_solucao = $request->dataSolucao;

        $chamado->save();

        return redirect('/chamados');
    }

    public function listar() {
        $chamados = Chamado::all();

        return view('chamados', ['chamado'=>$chamados]);
    }

    public function listar_chamado($id) {
        $chamado = Chamado::findOrFail($id);

        return view('chamado', ['chamado'=>$chamado]);
    }

}
