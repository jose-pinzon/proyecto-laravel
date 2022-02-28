<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservas;
use App\Habitacion;
use Illuminate\Support\Facades\DB;

class ReservasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function datosRersevas(){
        $reservas = Reservas::all();
        return response($reservas,200);
    }
    public function index(){
        $habitaciones = Habitacion::Where('estado','Ocupado')->paginate(10);
        return view('Vistas.Reservas.cuartos',[
            'habitaciones' => $habitaciones
        ]);
    }

    public function detallesChecout($id){
        $habitacion = Habitacion::find($id);
        return view('Vistas.Reservas.detalleCheck',[
                'habitacion' => $habitacion
        ]);
    }

    public function buscarHabitacion($search = null){


        if(!empty($search)){
            $habitaciones = Habitacion::Where('ubicacion','LIKE','%'.$search.'%')
                            ->orWhere('numero','LIKE','%'.$search.'%')
                            ->orWhere('estado','LIKE','%'.$search.'%')
                            ->Orderby('id','desc')->paginate(4);
        }else{
            $habitaciones = Habitacion::Orderby('id','desc')->paginate(10);
        }
        return view('Vistas.Reservas.CuartosPrueba',[
            'habitaciones' => $habitaciones
        ]);
    }

    public function detalles($id){
        $habitacion = Habitacion::find($id);
        return view('Vistas.Reservas.detalles',[
                'habitacion' => $habitacion
        ]);
    }

    public function GetClientes($id_grupo){
        $cliente= DB::select("SELECT * FROM clientes WHERE grupo_id = $id_grupo");
        return $cliente;
    }

    public function store(Request $request){
        $usuario =\Auth::user();
        $estado="Activo";

        $reserva = new Reservas();
        $reserva->habitacion_id=$request->get('habitacion_id');
        $reserva->usuario_id= $usuario->id;
        $reserva->grupo_id=$request->get('grupo_id');
        $reserva->costo=$request->get('costo');
        $reserva->fecha_entrada=$request->get('fecha_estrada');
        $reserva->fecha_salida=$request->get('fecha_salida');
        $reserva->dias=$request->get('dias');
        $reserva->meses=$request->get('meses');
        $reserva->pagado= $request->get('pagado');
        $reserva->cortesia=$request->get('cortesia');
        $reserva->estado=$estado;
        $reserva->save();
        $id = $request->get('habitacion_id');
        $estado='Ocupado';
        $habitaciones = Habitacion::find($id);
        $habitaciones->estado = $estado;
        $habitaciones->update();
    }

    public function actualizar(Request $request,$id){

        $estado='Desocupado';
        $habitacion = Habitacion::find($id);
        $habitacion->estado=$estado;
        $habitacion->update();

        $status = 'Inactivo';
        $id_reserva = $request->get('reserva');
        $reserva = Reservas::find($id_reserva);
        $reserva->costo=$request->get('costo');
        $reserva->fecha_entrada=$request->get('fecha_estrada');
        $reserva->fecha_salida=$request->get('fecha_salida');
        $reserva->dias=$request->get('dias');
        $reserva->meses=$request->get('meses');
        $reserva->cortesia=$request->get('cortesia');
        $reserva->extras=$request->get('extras');
        $reserva->pagado=1;
        $reserva->estado=$status;
        $reserva->update();



    }


}
