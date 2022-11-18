<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FornecedorController extends Controller
{

    private $fornecedor;
    private $State;
    private $City;
    private $request;

    public function __construct(Fornecedor $fornecedor, State $states, City $cities, Request $request)
    {
            $this->fornecedor = $fornecedor;
            $this->states = $states;
            $this->cities = $cities;
            $this->Request = $request;

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $fornecedores = $this->fornecedor->paginate(15);
     //   return view('fornecedores.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
		{
            $states = $this->states
                ->orderBy('name', 'ASC')->get();
            $cities = $this->cities
                ->Where('id', '=', 0)
                ->orderBy('name', 'ASC')->get();

            return view('fornecedores.create', ['states' => $states, 'cities' => $cities]);
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
                   $fornecedor = $this->fornecedor->create($data);
                   flash('Fornecedor cadastrado com sucesso!')->success();
                   return redirect()->route('fornecedores.index');

             } catch (\Exception $e) {
               $message = 'Erro ao cadastrar fornecedor!';

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

    public function loadcidades(Request $request)
    {
        $dataForm = $request->all();
        $estado_id = $dataForm['estado_id'];
        $sql = "Select id, name from cities";
        $sql = $sql . " Where state_id  = '$estado_id'";

        $cities = DB::select($sql);
       // dd($cities);
        return view('fornecedores.cidade_ajax', ['cities' => $cities]);
    }
}
