<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{

    private $produto;

    public function __construct(Produto $produto)
    {
            $this->produto = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create(Categoria $categoria, Fornecedor $fornecedor)
		{
            $categorias = $categoria->all(['id', 'nome']);
			$fornecedores = $fornecedor->all(['id', 'nome']);
			return view('produtos.create', compact(['categorias','fornecedores']));
		}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
  dd($data);
         try {
                    $produto = $this->produto->create($data);
                    flash('Produto criada com sucesso!')->success();
                    return redirect()->route('produtos.index');

              } catch (\Exception $e) {
                $message = 'Erro ao criar Produto!';

        if(env('APP_DEBUG')) {
        }
           $message = $e->getMessage();
        }
            flash($message)->warning();
            return redirect()->back();
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
