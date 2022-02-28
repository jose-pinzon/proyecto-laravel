<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class GrupoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vista(){
        return view('Vistas.Clientes.grupos');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $grupo = Grupo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = new Grupo();
        $grupo->nombre=$request->get('nombre');
        $grupo->descripcion=$request->get('descripcion');
        $grupo->num_personas=$request->get('num_personas');
        $grupo->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $grupo= Grupo::find($id);
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
        $grupo= Grupo::find($id);
        $grupo->nombre=$request->get('nombre');
        $grupo->descripcion=$request->get('descripcion');
        $grupo->num_personas=$request->get('num_personas');
        $grupo->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo= Grupo::find($id);
        $grupo->delete();
    }
}
