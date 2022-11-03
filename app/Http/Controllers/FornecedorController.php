<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    private $fornecedor;
    private $State;

    public function __construct(Fornecedor $fornecedor, State $State, City $City)
    {
            $this->fornecedor = $fornecedor;
            $this->State= $State;
            $this->City= $City;

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
    public function create(Fornecedor $fornecedor, State $State, City $City)
		{

			$State = $State->all(['id','name']);
            $City = $City->all(['id','state_id','name']);
			return view('fornecedores.create', compact(['fornecedor','State','City']));
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
}
