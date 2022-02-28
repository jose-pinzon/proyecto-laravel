<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitacion;

class habitacionesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function principal(){
        return view('Vistas.hotel.habitaciones');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro= $request->buscador;
        $habitacion = Habitacion::filtroHabitacion($filtro)->get();
        return response()->json($habitacion,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $habitacion = new Habitacion();
        $habitacion->tipo_id=$request->get('tipo_id');
        $habitacion->numero=$request->get('numero');
        $habitacion->ubicacion=$request->get('ubicacion');
        $habitacion->precio=$request->get('precio');
        $habitacion->estado=$request->get('estado');
        $habitacion->descripcion=$request->get('descripcion');
        $habitacion->capacidad=$request->get('capacidad');
        $habitacion->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return $habitacion = Habitacion::find($id);
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
        $habitacion = Habitacion::find($id);
        $habitacion->tipo_id=$request->get('tipo_id');
        $habitacion->numero=$request->get('numero');
        $habitacion->ubicacion=$request->get('ubicacion');
        $habitacion->precio=$request->get('precio');
        $habitacion->estado=$request->get('estado');
        $habitacion->descripcion=$request->get('descripcion');
        $habitacion->capacidad=$request->get('capacidad');
        $habitacion->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habitacion= Habitacion::find($id);
        $habitacion->delete();
    }
}
