@extends('layouts.argon', ['title' => __('User Profile')])
@section('content')
<!-- Page content -->
<section id="Grupo">
    <div class="container-fluid mt--2">
        <div class="row">
            <div class="col">

                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h1>Detalles del checkout: </h1>
                        <section class="seccion_detalles_habitacion2">
                            <div class="form-group content_detalles_habitacion">
                                <label class="form-control-label " for="input-name">{{ __('Numeros') }}</label>
                                <h2 class="bg-primary">{{$habitacion->numero}}</h2>
                            </div>
                            <div class="form-group" hidden>
                                <label class="form-control-label " for="input-name">{{ __('id') }}</label>
                                <!-- <h2 class="bg-primary">{{$habitacion->id}}</h2> -->
                                <!-- <input type="text"  id="id_habitacion" name="id_habitacion" value="{{$habitacion->id}}"> -->
                            </div>

                            <div class="form-group content_detalles_habitacion">
                                <label class="form-control-label" for="input-name">{{ __('Tipo :') }}</label>
                                <h3>{{$habitacion->tipo->tipo}} </h3>
                            </div>
                            <div class="form-group content_detalles_habitacion">
                                <label class="form-control-label " for="input-name">{{ __('Descripcion :') }}</label>
                                <h3 class="des">{{$habitacion->descripcion}}</h3>
                            </div>
                            <div class="form-group content_detalles_habitacion">
                                <label class="form-control-label " for="input-name">{{ __('ubicacion :') }}</label>
                                <h3 class="des">{{$habitacion->ubicacion}}</h3>
                            </div>

                            <div class="form-group content_detalles_habitacion">
                                <label class="form-control-label " for="input-name">{{ __('Precio') }}</label>
                                <h2 class="precio">$ {{$habitacion->precio}}</h2>
                            </div>

                            <div class="form-group content_detalles_habitacion">
                                <label class="form-control-label " for="input-name">{{ __('Capacidad') }}</label>
                                <h2 class="precio">{{$habitacion->capacidad}}</h2>
                            </div>
                        </section>
                        <h1>Datos del grupo:</h1>
                        <div id="reserva">

                        @foreach($habitacion->reservaciones as $reservacion)
                                        @if($reservacion->estado == 'Activo')

                            <div class="reserva">
                                <section class="datos_grupos">
                                    <div class="form-group  c-grupo">
                                        <h2>grupo:</h2>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Grupo</span>
                                            </div>
                                            <p class="form-control col-md-14">{{$reservacion->grupos->nombre}}</p>
                                        </div>
                                    </div>
                                        <input hidden type="text" value="{{$habitacion->id}}" name="id_habitacion">
                                    <div class="c-clientes">
                                        <h2>Clientes: </h2>
                                        <div>
                                            @foreach($reservacion->grupos->clientes as $client)
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    {{$client->nombre}}
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>



                                <section class="c-date">
                                    <div>
                                        <h2>fechas</h2>
                                        <input type="date" v-model="f1" value="">
                                        <input type="date" v-model="f2">
                                            <h3>Dias:</h3>
                                            <p>@{{ mostrardias[0]}}</p>
                                            <h3>meses:</h3>
                                            <p>@{{ mostrardias[1]}}</p>


                                    </div>

                                </section>
                                @if($reservacion->pagado == 0)
                                <p class="etiqueta">Pagado</p>
                                @endif
                            </div>


                            <h1 class="h1-dg">Datos generales: </h1>
                            <section class="content-pagos">
                                <div class="form-group">
                                    <h3>Faltante:</h3>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                            <!-- <select name="" id="" v-model="precio"  >
                                                <option  class="form-control" value="{{$habitacion->precio}}">{{$habitacion->precio}}</option>
                                            </select> -->
                                            <input type="number" class="form-control" v-model="precio" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3>Cortesia:</h3>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="number" class="form-control" v-model="cortesia" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3>Extras:</h3>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="number" class="form-control" v-model="Extras" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3>total:</h3>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="number" class="form-control" v-model="total" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">@{{totalprecio}}.00</span>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div>
                                    <a class="btn btn-success" @click="actualizarDatos({{$habitacion->id}})">Pagar</a>
                                    <a class="btn btn-danger" href="{{route('listado.habitaciones')}} ">Regresar</a>
                                    <a class="btn btn-primary" @click="mostrarDatos({{$habitacion->id}})">Datos Guardados</a>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('script')
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
<script>
    var paths = window.location.pathname.split('/');
    var id_pag = paths[paths.length-1];

    var ruta =document.querySelector("[name=route]").value;
    var apiGrupo = ruta +'/gruposApi';
    var apiReservas = ruta + '/ReservasApi';
    var apicuarto = ruta +'/apiHabitaciones';
    var rutaGuardar= ruta + '/guardar';
    var rutaActualizar= ruta + '/actualizar';
    var urlhome = ruta + '/buscar/Habitacion/';

    new Vue({
        el: "#reserva",
        data: {
            f1:"",
            f2: "",
            dias:"",
            meses:"",
            id_habitacion:id_pag,
            id_reserva:"",
            grupos: [],
            clientes: [],
            cuartos:[],
            reservas:[],
            grupo_e: "",
            precio:0,
            pagado:0,
            cortesia:0,
            Extras:0,
            total:0,



        },
        created() {
            this.obtenergrupos();
            this.obtenerCuartos();
            this.obtenerReservas();
        },
        methods: {
            mostrarDatos(id){
                var registros = [];
                console.log(registros);
                for (let i in this.reservas) {
                    if(this.reservas[i].habitacion_id == id && this.reservas[i].estado == 'Activo' )
                        registros.push(this.reservas[i]);
                    }
                    this.id_reserva = registros[0].id;
                    this.precio = registros[0].costo;
                    this.cortesia = registros[0].cortesia;
                    this.Extras = registros[0].extras;
                    this.f1 = registros[0].fecha_entrada;
                    this.f2 = registros[0].fecha_salida;
                    this.pagado = registros[0].pagado;
                },


            obtenergrupos() {
                this.$http
                    .get(apiGrupo)
                    .then((json) => {
                        this.grupos = json.data;
                    })
                    .catch((json) => {
                        console.log(json);
                    });
            },
            obtenerCuartos(){
                this.$http
                    .get(apicuarto)
                    .then((json) => {
                        this.cuartos = json.data;

                    })
                    .catch((json) => {
                        console.log(json);
                    });
            },
            obtenerReservas(){
                this.$http.get(apiReservas).then((json)=>{
                    this.reservas = json.data;
                }).catch((json)=>{
                    console.log(json);
                })
            },
            obtenerClientes(e) {
                var id_grupo = e.target.value;
                this.$http.get(ruta + '/clientes/' + id_grupo).then(function(js) {
                    this.clientes = js.data;
                })
            },

            redireccionar(url){
                return window.location.href = url;
            },
            actualizarDatos(habitacion_id){
                let cortesia= parseFloat(this.cortesia);
                let extras= parseFloat(this.Extras);
                let datos = {
                    habitacion_id:habitacion_id,
                    costo:this.total,
                    fecha_estrada:this.f1,
                    fecha_salida:this.f2,
                    dias:this.dias,
                    meses:this.meses,
                    cortesia:cortesia,
                    extras:extras,
                    reserva:this.id_reserva,
                };
                console.log(datos)
                this.$http
                .patch(rutaActualizar + "/" + habitacion_id, datos)
                .then((json) => {
                    this.redireccionar(urlhome);
                })
                .catch((json) => {
                    console.log(json);
                });
            },
            restaFechas(f1, f2) {
                var aFecha1 = f1.split('/');
                var aFecha2 = f2.split('/');
                var fFecha1 = Date.UTC(aFecha1[2], aFecha1[1] - 1, aFecha1[0]);
                var fFecha2 = Date.UTC(aFecha2[2], aFecha2[1] - 1, aFecha2[0]);
                var dif = fFecha2 - fFecha1;
                var dias = Math.floor(dif / (1000 * 60 * 60 * 24))
                var meses = Math.floor(dias/30);

                return [dias,meses];
            },

            convertDateFormat(string) {
                var info = string.split('-');
                return info[2] + '/' + info[1] + '/' + info[0];
            },
        },

        computed: {
            mostrardias() {
                var fecha1 = this.f1;
                var fecha2 = this.f2;
                while (fecha1 == '' || fecha2 == '' || fecha2 < fecha1) {
                    fecha1 = '2021-08-01'
                    fecha2 = '2021-08-01';
                }
                var Fe1 = this.convertDateFormat(fecha1);
                var Fe2 = this.convertDateFormat(fecha2);
                var resultado = this.restaFechas(Fe1, Fe2);
                this.dias = resultado[0];
                this.meses= resultado[1];
                return resultado;
            },


            totalprecio(){
                let precio_dia = parseFloat(this.precio);
                let dias = parseInt(this.dias);
                let meses= parseInt(this.meses) * 30;
                var total_precio = '';

                if(precio_dia == "" && dias == ""){
                    total_precio = ''
                }else{
                    let totaldias = dias + meses;
                    total_precio = precio_dia * totaldias;
                }
                var suma = 0;
                suma = total_precio - parseFloat( this.cortesia) + parseFloat(this.Extras);
                this.total=suma;
            },

        },
    })
</script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">
