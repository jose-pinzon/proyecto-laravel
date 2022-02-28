@extends('layouts.argon', ['title' => __('User Profile')])
@section('content')

<!-- Page content -->
<section id="Grupo">
    <div class="container-fluid mt--2">
        <div class="row">
            <div class="col">
                <div class="card">


                    <div class="contenedor_cajas">
                    <h1 class="h1-check "> habitaciones</h1>
                        <div class="nav-reservas">
                            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item "><a class="activo-a " href="{{route('listado.habitaciones',['search' => 'henequen' ])}}">henequen</a> </li>
                                    <li class="nav-item "><a class="activo-a" href="{{route('listado.habitaciones',['search' => 'apartado' ])}}">apartado</a> </li>
                                    <li class="nav-item "><a class="activo-a" href="{{route('listado.habitaciones',['search' => 'suites' ])}}">suites</a> </li>
                                    <li class="nav-item "><a class="activo-a" href="{{route('listado.habitaciones',['search' => 'cabañas' ])}}">cabañas</a> </li>
                                    <li class="nav-item "><a class="activo-a" href="{{route('listado.habitaciones')}}">Todas las habitaciones</a> </li>
                                </ul>
                                <br>
                                <form action="{{route('listado.habitaciones')}}" method="GET" id="buscadorH" class="form-inline my-2 my-lg-0">
                                    <!--se le pone id para poder usar el javascript-->
                                    <input class="form-control mr-sm-2" type="text" id="search" placeholder="buscar">
                                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="buscar">
                                </form>
                            </nav>
                        </div>
                        @foreach($habitaciones as $habitacion)
                        <section class="cajas">
                            <div class="card" style="width: 18rem;">
                                @if($habitacion->estado == 'Ocupado')
                                <div class="color" >
                                    @else
                                    <div class="color2">
                                        @endif
                                        @if($habitacion->estado != "Ocupado")
                                        <img class="card-img-top" src="{{asset('assets/img/habitacion.jpg')}}" alt="Card image cap">
                                        @else
                                        <img class="card-img-o" src="{{asset('assets/img/puerta cerrada.jpg')}}"  alt="Card image cap">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">Numero: <p class="numero"> {{$habitacion->numero}}</p>
                                            </h5>
                                            @foreach($habitacion->reservaciones as $reservacion)
                                                    @if($reservacion->estado == 'Activo')
                                                    <p class="form-control col-8">{{$reservacion->grupos->nombre}}</p>
                                                    <p class="form-control col-8">Dias: {{$reservacion->dias}}</p>
                                                    @endif
                                            @endforeach
                                            <h5 class="card-title font-weight-bold"> </h5>
                                        </div>

                                        @if($habitacion->estado == 'Desocupado')
                                        <div class="col-lg-12 col-5 text-right btn-caja-grupo" >
                                            <a href="{{route('habitacion.detalle',['id' => $habitacion->id])}}" class="btn btn-sm btn-primary">Reserva</a>
                                        </div>
                                        @else
                                        <div class="col-lg-12 col-5 text-right btn-caja-grupo" id="Cuartosid">
                                            <span class="btn btn-sm btn-neutral" @click="mensaje()">Reservado</span>
                                        </div>
                                        @endif

                                    </div>
                                </div>

                        </section>
                        @endforeach

                    </div>

                    <h2></h2>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<div class="clearfix">
    {{$habitaciones->links()}}
</div>
@endsection
@push('script')
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
<script>
    var url = "http://localhost/Proyecto-estadias/estadias/public/tipoHabitaciones";
    new Vue({
        el: '#Cuartosid',
        data: {
            tipo: '',
            tipos: [],
            prueba: 'datos por cargar',
        },
        created() {
            this.obtenertipos();
        },
        methods: {
            obtenertipos() {
                this.$http
                    .get(url)
                    .then((json) => {
                        this.tipos = json.data;
                    })
                    .catch((json) => {
                        console.log(json);
                    });
            },
            alerta(titulo,texto, tipo){
                Swal.fire(
                titulo,
                texto,
                tipo
            );
            },

            mensaje(){
                return this.alerta('Reservado','Este cuarto yaha sido reservado','warning');
            }

        }
    })
</script>
<script>
    var url = 'http://localhost/Proyecto-estadias/estadias/public/';

    window.addEventListener("load", function() {
        $('#buscadorH').submit(function() {
            $(this).attr('action', url + '/buscar/Habitacion/' + $('#buscadorH #search').val());
        })
    })
</script>

@endpush
