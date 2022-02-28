@extends('layouts.argon', ['title' => __('User Profile')])

@section('content')

<!-- Page content -->
<section id="habitacion">
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Habitaciones</h3>

                        <div class="col-lg-12 col-5 text-right">

                            <a href="#" class="btn btn-sm btn-neutral" @click="Modalshow()">Nueva habitacion</a>
                            <!-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->

                            <form class="navbar-search navbar-search-black form-inline mr-sm-3" id="navbar-search-main">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Buscar" type="text" v-model="buscador" @keyup="buscar">
                                    </div>
                                </div>
                                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                </form>

                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name" ></th>
                                    <th scope="col" class="sort" data-sort="budget">Tipo</th>
                                    <th scope="col" class="sort" data-sort="status">Numero</th>
                                    <th scope="col">Ubicacion</th>
                                    <th scope="col" class="sort" data-sort="completion">Precio</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Capacidad</th>
                                    <th></th>
                                </tr>
                            </thead>




                            <tbody class="list">

                                <tr v-for="habitacion of habitaciones">
                                    <!-- <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="{{asset('assets/img/theme/vue.jpg')}}">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                        </div>
                      </div>
                    </th> -->



                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status" hidden>@{{habitacion.id}}</span>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status">@{{habitacion.tipo.tipo}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status">@{{habitacion.numero}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status">@{{habitacion.ubicacion}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status">$@{{habitacion.precio}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status"> @{{habitacion.estado}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="content-description">
                                            <span class="status">@{{habitacion.descripcion}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="hijo">@{{habitacion.capacidad}}</span>
                                        </span>
                                    </td>




                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item"  @click="editar(habitacion.id)">Actualizar</a>
                                                <a class="dropdown-item" @click="eliminar(habitacion.id)">Eliminar</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <!-- <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- modal -->

    <div class="col-md-4">
        <div class="modal fade" id="modalhabitacion" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default" v-if="estado==true">Agregar habitacion</h6>
                        <h6 class="modal-title" id="modal-title-default" v-if="estado==false">Actualizar habitacion</h6>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                        <span v-if="!tipo_id" class="text-danger">Seleccione un tipo*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Tipo</span>
                                </div>

                                <select name="" id="" type="text" v-model="tipo_id" class="form-control" aaria-describedby="basic-addon1" required>
                                    <option  v-for="tipo in tipos"  v-bind:value="tipo.id">@{{tipo.tipo}}</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                        <span v-if="!numero" class="text-danger">requerido(coloque solo numeros)*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" >Numero</span>
                                </div>
                                <input type="number" v-model="numero" class="form-control"  aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="form-group">
                        <span v-if="!ubicacion" class="text-danger">requerido*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Ubicacion</span>
                                </div>
                                <select name="" id="" class="form-control" aaria-describedby="basic-addon1" v-model="ubicacion" required >
                                <option value="henequen">HENEQUEN</option>
                                <option value="planetario">PLANETARIO</option>
                                <option value="cabañas">CABAÑAS(apartado)</option>
                                <option value="suites">SUITES(apartado)</option>
                                <option value="principal">PRINCIPAL</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                        <span v-if="!precio" class="text-danger">Solo numeros</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">precio: $</span>
                                </div>
                                <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" v-model="precio" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        <span v-if="!Estado" class="text-danger">Seleccione el estado*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Estado</span>
                                </div>
                                <select name="" id="" class="form-control" aaria-describedby="basic-addon1" v-model="Estado" required >
                                <option value="Ocupado">Ocupado</option>
                                <option value="Desocupado">Desocupado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Descripcion</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" v-model="descripcion" required></textarea >
                            </div>
                        </div>

                        <div class="form-group">
                        <span v-if="!capacidad" class="text-danger">requerido*</span>
                        <span v-if="!capacidad" class="text-danger">Coloque solo numeros</span>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Capacidad</span>
                                </div>
                                <input type="number" v-model="capacidad" class="form-control"  aria-describedby="basic-addon1" required>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-if="estado==true" @click="Guardar()" >Guardar</button>
                        <button type="button" class="btn btn-primary" v-if="estado==false" @click="actualizar()">Actualizar</button>
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- Fin modal -->



</section>

@endsection
@push('script')
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
<script type="text/javascript" src="{{asset('js/apis/habitacion.js')}}"></script>
@endpush




