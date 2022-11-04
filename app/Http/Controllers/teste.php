TesteController.php
Quem pode acessar

Propriedades do sistema
Tipo
PHP
Tamanho
3 KB
Armazenamento usado
3 KB
Local
Admin
Proprietário
Ricardo Costa
Modificado
6 de mai. de 2021 por Ricardo Costa
Aberto
09:23 por mim
Criado em
6 de mai. de 2021
Sem descrição
Os leitores podem fazer o download
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setor;
use App\Models\Funcao;
use App\Models\Grupo;
use Illuminate\Support\Facades\DB;

class TesteController extends Controller
{
    public function __construct(Setor $setor, Funcao $funcao, Grupo $grupo)
    {
        $this->setor = $setor;
        $this->funcao = $funcao;
        $this->grupo = $grupo;
    }
    public function index()
    {
        $setores = $this->setor
                ->orderBy('nome', 'ASC')->get();
        $funcoes = $this->funcao
                ->Where('id', '=', 0)
                ->orderBy('nome', 'ASC')->get();

        $grupos = $this->grupo
                ->Where('id', '=', 0)
                ->orderBy('nome', 'ASC')->get();
        return view('admin.teste.index', ['setores' => $setores, 'funcoes' => $funcoes, 'grupos' => $grupos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadFuncoes(Request $request)
    {
        $dataForm = $request->all();
        $setor_id = $dataForm['setor_id'];
        $sql = "Select funcao.id, funcao.nome from grupofuncao, funcao ";
        $sql = $sql . " Where grupofuncao.funcao_id = funcao.id  ";
        $sql = $sql . " and grupofuncao.setor_id = '$setor_id'  ";
        $sql = $sql . " order by funcao.nome ";
        $funcoes = DB::select($sql);
        return view('admin.teste.funcao_ajax', ['funcoes' => $funcoes]);
    }


    public function load_grupos(Request $request)
    {
        $dataForm = $request->all();
        $setor_id = $dataForm['setor_id'];
        $funcao_id = $dataForm['funcao_id'];
        $sql = "Select grupo.id, grupo.nome from grupofuncao, funcao, grupo ";
        $sql = $sql . " Where grupofuncao.funcao_id = funcao.id ";
        $sql = $sql . " and grupofuncao.grupo_id = grupo.id ";
        $sql = $sql . " and grupofuncao.setor_id = '$setor_id' ";
        $sql = $sql . " and grupofuncao.funcao_id = '$funcao_id' ";
        $sql = $sql . " order by grupo.nome";
        $grupos = DB::select($sql);
        return view('admin.teste.grupo_ajax', ['grupos' => $grupos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
