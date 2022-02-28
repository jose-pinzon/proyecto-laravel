<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservas;
use App\Habitacion;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reservas = Reservas::all();
        $habitaciones = Habitacion::where('estado','Ocupado')->get();
        $habitacionesT = Habitacion::where('estado','Desocupado')->get();
        $habitacion_c = Habitacion::all();
        $usuario = User::all();

        return view('home',[
            'usuario'=> $usuario,
            'habitacion_c' => $habitacion_c,
            'habitacionesT' => $habitacionesT,
            'habitaciones'=>$habitaciones
        ]);
    }
}
