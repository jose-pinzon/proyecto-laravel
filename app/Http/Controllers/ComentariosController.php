<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;


class ComentariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getComentarios(){
        $comentarios = Comentario::orderBy('id','desc')->paginate(8);

        return view('Vistas.Comentarios.comentarios',[
            'comentarios' => $comentarios
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $comentarios = Comentario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $comentarios=Comentario::find($id);
        $comentarios->delete();
        return back()->with(['message'=>'se elimino correctamente el comentario']);
    }
}
