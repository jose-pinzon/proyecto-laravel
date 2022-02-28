@extends('layouts.argon', ['title' => __('User Profile')])
@section('estilos')
<link rel="stylesheet" href="css/estilos.css">
@endsection
@section('content')

<!-- Page content -->
<section id="Grupo">
    <div class="container-fluid mt--2">
        <div class="row">
            <div class="col">



                <div class="card">

                    <div class="contenedor_cajas" >
                        <div class="col-lg-12 col-8 btn-caja">
                            <a href="#" class="btn-grupo" @click="mostrarModal()">Agregar grupo</a>
                        </div>
                        <section class="cajas" v-for="grupo of grupos">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="assets/img/theme/img-1-1000x600.jpg" alt="Card image cap">
                                <h3 class="numero_grupo">Numero de Grupo: @{{grupo.id}}</h3>
                                <h3 class="numero_grupo">Nombre de grupo: @{{grupo.nombre}}</h3>
                                <div class="col-lg-12 col-5 text-right btn-caja-grupo">
                                    <a href="#" class="btn btn-sm btn-neutral" @click="editar(grupo.id)">editar grupo</a>
                                    <a href="#" class="btn btn-sm btn-danger" @click="eliminar(grupo.id)">Eliminar</a>
                                    <a href="#" class="btn btn-sm btn-primary" @click="mostrarclientes(grupo.id)">clientes</a>
                                </div>

                                <div class="card-body">

                                    <h5 class="card-title">Numero de personas: @{{grupo.num_personas}}</h5>
                                    <p class="card-descrpcion">Descripcion: @{{grupo.descripcion}}</p>

                                    <div class="contenido_clientes">
                                        <transition name="aparecer">
                                            <h1 v-if="mostrar && id_grupo == grupo.id">Clientes</h1>
                                        </transition>
                                        <transition name="aparecer">
                                            <table v-if="mostrar && id_grupo == grupo.id" class="table table-bordered table-striped">
                                                <thead>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="cliente of grupo.clientes">
                                                        <td>@{{cliente.nombre}}</td>
                                                        <td>@{{cliente.apellido}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </transition>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- modal -->
    <div class="col-md-4">
        <div class="modal fade" id="modalGrupo" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default" v-if="estado==true">Agregar Grupo</h6>
                        <h6 class="modal-title" id="modal-title-default" v-if="estado==false">Actualizar Grupo</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <span v-if="!nombre">requerido*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre grupo</span>
                                </div>
                                <input type="text" v-model="nombre" class="form-control" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Descripcion</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" v-model="descripcion" required></textarea>
                            </div>
                        </div>





                        <div class="form-group">
                            <span v-if="!num_personas" class="validaciones">requerido*</span>


                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Numero de personas</span>
                                </div>
                                <input type="number" v-model="num_personas" class="form-control" aria-describedby="basic-addon1" required>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-if="estado==true" @click="GuardarDatos()">Guardar</button>
                        <button type="button" class="btn btn-primary" v-if="estado==false" @click="actualizar()">Actualizar</button>
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- fin  modal -->
    </div>


</section>

@endsection
@push('script')
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/Grupos.js"></script>
@endpush
