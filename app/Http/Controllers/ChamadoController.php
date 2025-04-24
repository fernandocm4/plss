<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Chamado;
use App\Models\Situacao;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class ChamadoController extends Controller
{


    public function home() {

        //
        $situacao_resolvido = DB::table('situacoes')->where('titulo_situacao', 'Resolvido')->value('id');


        $chamados_dentro_prazo = DB::table('chamados')
            ->where('situacao_id', $situacao_resolvido)
            ->whereNotNull('data_solucao')
            ->whereRaw('data_solucao::date <= prazo_solucao::date')
            ->whereRaw('date_part(\'month\', data_solucao) = ?', [Carbon::now()->month])->count();

        $todos_chamados_mes = DB::table('chamados')
        ->whereRaw('date_part(\'month\', data_solucao) = ?', [Carbon::now()->month])->count();

        $todos_chamados = DB::table('chamados')->count();

        if ($todos_chamados_mes) {
            $percent_dentro_prazo = ($chamados_dentro_prazo * 100) / $todos_chamados_mes;
        } else {
            $percent_dentro_prazo = 0;
        }

        //$percent_dentro_prazo = ($chamados_dentro_prazo * 100) / $todos_chamados_mes;

        

        return view('home', ['porcentagemPrazo' => $percent_dentro_prazo, 'dentroPrazo'=>$chamados_dentro_prazo, 'chamadosMes'=>$todos_chamados_mes, 'todos'=>$todos_chamados]);

    }

    public function index()
    {
        $dataAtual = Carbon::now()->format('Y-m-d');
        $horaAtual = Carbon::now()->format('H:i:s');
        $prazoSolucao = Carbon::now()->addDays(3)->format('Y-m-d');

        $dataSalva = $dataAtual.''.$horaAtual;

        $categorias = DB::table('categorias')->get();

        return view('criar_chamado', [
            'dataCriacao' => $dataAtual,
            'dataPrazo' => $prazoSolucao,
            'categorias' => $categorias
        ]);
    }

    public function criar(Request $request) {
        $chamado = new Chamado;

        $dataAtual = Carbon::now()->format('Y-m-d H:i:s');

        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->categoria_id = $request->categoria;

        $chamado->situacao_id = $request->situacao;
        $chamado->prazo_solucao = $request->prazoSolucao;
        $chamado->data_criacao = $dataAtual;
        $chamado->data_solucao = $request->dataSolucao;

        $chamado->save();

        return redirect('/chamados');
    }

    public function delete($id) {
        $chamado = Chamado::findOrFail($id);
        $chamado->delete();

        return redirect()->route('chamados');
    }

    public function update(Request $request, $id) {
        $chamado = Chamado::findOrFail($id);
        //$chamados = Chamado::with(['categoria', 'situacao'])->findOrFail($id);

        

        $chamado->situacao_id = $request->situacao;
        $chamado->data_solucao = $request->dataSolucao;

        $chamado->save();
        return redirect()->route('chamados');
    }

    public function listar() {
        //$chamados = Chamado::all();

        $chamados = Chamado::with(['categoria', 'situacao'])->get();
        return view('chamados', ['chamado'=>$chamados]);
    }

    public function listar_chamado($id) {
        //$chamado = Chamado::findOrFail($id);
        $chamados = Chamado::with(['categoria', 'situacao'])->findOrFail($id);
        $situacao = DB::table('situacoes')->get();

        $idResolvido = Situacao::where('titulo_situacao', 'Resolvido')->value('id');

        return view('chamado', ['chamado'=>$chamados, 'situacoes'=>$situacao, 'idResolvido'=>$idResolvido]);
    }

}
