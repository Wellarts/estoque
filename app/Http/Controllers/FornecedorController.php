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

    public function __construct(Fornecedor $fornecedor, State $State, City $City, Request $request)
    {
            $this->fornecedor = $fornecedor;
            $this->State = $State;
            $this->City = $City;
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

			$State = $this->State
                ->orderBy('name', 'ASC')->get();
            $City = $this->City
                ->Where('id', '=', 0)
                ->orderBy('name', 'ASC')->get();

                return view('fornecedores.create', ['State' => $State, 'City' => $City]);
		}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function cidades(Request $request)
    {
        dd($request);

        $dataForm = $request->all();
        $state_id = $dataForm['state_id'];
        $sql = "Select id, name from cities";
        $sql = $sql . " Where  state_id  = $state_id ";

        $cities = DB::select($sql);
        return view('fornecedores.cidade.ajax', ['cities' => $cities]);
    }
}
