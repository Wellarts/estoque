<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
class CategoriaController extends Controller
{

    /**
     * Display a listing of the resource .
     *
     * @return \Illuminate\Http\Response
     */

    private $categoria;

    public function __construct(Categoria $categoria)
    {
            $this->categoria = $categoria;
    }

    public function index()
    {
        $categorias = $this->categoria->paginate(15);
        return view('categorias.index', compact('categorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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

         try {
                    $categoria = $this->categoria->create($data);
                    flash('Categoria criada com sucesso!')->success();
                    return redirect()->route('categorias.index');

              } catch (\Exception $e) {
                $message = 'Erro ao criar categoria!';

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
    public function show(Categoria $categoria)
    {
        $categorias = $categoria->all(['id', 'nome']);
        return view('categorias.edit', compact('categoria'));
    }


    public function edit(Categoria $categoria)
    {
        return redirect()->route('categorias.show', ['categoria' => $categoria->id]);
    }


    public function update(Request $request, Categoria $categoria)
    {

            $data = $request->all();

        try {
                $categoria->update($data);

                flash('Categoria atualizada com sucesso!')->success();
                return redirect()->route('categorias.index');

            }catch (\Exception $e) {
                $message = 'Erro ao atualizar categoria!';
                if(env('APP_DEBUG')) {
                $message = $e->getMessage();
                }
            }

            flash($message)->warning();
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //dd($categoria);
        try {
            $categoria->delete();
            flash('Categoria removida com sucesso!')->success();
            return redirect()->route('categorias.index');

        } catch (\Exception $e) {
        $message = 'Erro ao remover categoria!';

        if(env('APP_DEBUG')) {
        $message = $e->getMessage();
        }

        flash($message)->warning();
        return redirect()->back();
        }
    }

}
