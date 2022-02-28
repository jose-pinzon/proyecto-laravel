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
                        <h1>Detalles de la habitacion: </h1>
                        <section class="seccion_detalles_habitacion">
                            <div class="form-group content_detalles_habitacion">
                                <label class="form-control-label " for="input-name">{{ __('Numero') }}</label>
                                <h2 class="bg-primary">{{$habitacion->numero}}</h2>
                            </div>
                            <div class="form-group" hidden>
                                <label class="form-control-label " for="input-name">{{ __('id') }}</label>
                                <!-- <h2 class="bg-primary">{{$habitacion->id}}</h2> -->
                                <input type="text"  id="id_habitacion" name="id_habitacion" value="{{$habitacion->id}}">
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
                            <div class="reserva">
                                <section class="datos_grupos">
                                    <div class="form-group  c-grupo">
                                    <span v-if="!grupo_e" class="text-danger">Seleccione Grupo*</span>
                                        <h2>grupo:</h2>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Grupo</span>
                                            </div>
                                            <select name="" id="" type="text" v-model="grupo_e" class="form-control" aaria-describedby="basic-addon1" @change="obtenerClientes" required>
                                                <option v-for="grupo in grupos" v-bind:value="grupo.id">@{{grupo.nombre}}</option>
                                            </select>
                                        </div>
                                    </div>

                                        <input hidden type="text" value="{{$habitacion->id}}" name="id_habitacion">

                                    <div class="c-clientes">
                                        <h2>Clientes: </h2>
                                        <div>
                                            <ul class="list-group" v-for="cliente in clientes">
                                                <li class="list-group-item">
                                                    @{{cliente.nombre}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </section>



                                <section class="c-date">
                                    <div>
                                        <h2>fechas</h2>
                                        <input type="date" v-model="f1">
                                        <input type="date" v-model="f2">
                                            <h3>Dias:</h3>
                                            <p>@{{ mostrardias[0]}}</p>
                                            <h3>meses:</h3>
                                            <p>@{{ mostrardias[1]}}</p>
                                    </div>
                                </section>
                            </div>


                            <h1 class="h1-dg">Datos generales: </h1>
                            <section class="content-pagos">
                                <div class="form-group">
                                    <h3>precio:</h3>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                            <select name="" id="" v-model="precio"  >
                                                <option  class="form-control" value="{{$habitacion->precio}}">{{$habitacion->precio}}</option>
                                            </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <h3>Adelanto:</h3>
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
                                @if($habitacion->estado != "Ocupado")
                                    <input type="submit" value="guardar" class="btn btn-default"  @click="guardarDatos({{$habitacion->id}})">
                                    <a class="btn btn-danger" href="{{route('listado.habitaciones')}}">Cancelar</a>
                                @else
                                    <a class="btn btn-danger" href="{{route('listado.habitaciones')}} ">regresar</a>
                                @endif

                            </div>

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
    var ruta =document.querySelector("[name=route]").value;
    var apiGrupo = ruta +'/gruposApi';
    var apicuarto = ruta +'/apiHabitaciones';
    var urlhome = ruta + '/buscar/Habitacion/';

    var rutaGuardar= ruta + '/guardar';
    new Vue({
        el: "#reserva",
        data: {
            f1:"",
            f2: "",
            dias:"",
            meses:"",
            id_habitacion:"",
            grupos: [],
            clientes: [],
            cuartos:[],
            grupo_e: "",
            precio:0,
            cortesia:0,//
            total:0,



        },
        created: function() {
            this.obtenergrupos();
            this.obtenerCuartos();
        },
        methods: {
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

            Alerta(titulo,message,tipo){
            Swal.fire(
                titulo,
                message,
                tipo
                );
            },


            obtenerClientes(e) {
                var id_grupo = e.target.value;
                this.$http.get(ruta + '/clientes/' + id_grupo).then(function(js) {
                    this.clientes = js.data;
                })
            },

            guardarDatos(habitacion_id){

                while (this.grupo_e == '' || this.f1 == '' || this.f2 ==''|| this.precio == '') {
                    return this.Alerta('Faltan datos','Por favor, llene todos los datos requeridos para poder reservar','warning')
                }
                var pago = 1;
                if(this.total == 0){
                    pago = 0
                }
                let cortesia= parseFloat(this.cortesia);
                let datos = {
                    habitacion_id:habitacion_id,
                    grupo_id:this.grupo_e,
                    costo:this.total,
                    fecha_estrada:this.f1,
                    fecha_salida:this.f2,
                    dias:this.dias,
                    pagado:pago,
                    meses:this.meses,
                    cortesia:cortesia,
                };

                this.$http
                .post(rutaGuardar, datos)
                .then((json) => {
                    this.redireccionar(urlhome);
                    return  this.Alerta('Reservado','Reservacion realizada con exito','success');

                })
                .catch((json) => {
                    console.log(json);
                });

            },
            redireccionar(url){
                return window.location.href = url;
            },
            restaFechas(f1, f2) {
                var aFecha1 = f1.split('/');
                var aFecha2 = f2.split('/');
                var fFecha1 = Date.UTC(aFecha1[2], aFecha1[1] - 1, aFecha1[0]);
                var fFecha2 = Date.UTC(aFecha2[2], aFecha2[1] - 1, aFecha2[0]);
                var dif = fFecha2 - fFecha1;
                var dias = Math.floor(dif / (1000 * 60 * 60 * 24))
                var meses = Math.floor(dias/30);
                let Dias = dias - meses * 30  ;
                return [Dias,meses];
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
                suma = total_precio - parseFloat( this.cortesia);
                this.total=suma;
            }

        },
    })
</script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">
