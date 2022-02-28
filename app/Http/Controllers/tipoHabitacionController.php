<?php

namespace App\Http\Controllers;

use App\Habitacion;
use Illuminate\Http\Request;
use App\Tipo;

class tipoHabitacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vista(){
        return view('Vistas.hotel.tipohabitacion');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro= $request->buscador;
        $tipo = Tipo::filtroTipo($filtro)->get();
        return response()->json($tipo,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipos = new Tipo();
        $tipos-> precio = $request->get('precio');
        $tipos-> tipo = $request->get('tipo');
        $tipos-> descripcion = $request->get('descripcion');

        $tipos->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $tipos = Tipo::find($id);
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
        $tipos = Tipo::find($id);
        $tipos-> tipo = $request->get('tipo');
        $tipos-> precio = $request->get('precio');
        $tipos-> descripcion = $request->get('descripcion');

        $tipos->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipos = Tipo::find($id);
        $tipos->delete();
    }
}
