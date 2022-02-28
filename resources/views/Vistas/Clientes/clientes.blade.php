@extends('layouts.argon', ['title' => __('User Profile')])

@section('content')

<!-- Page content -->
<section id="cliente">
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Clientes</h3>
                        <div class="col-lg-12 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral" @click="Modalshow()">Nuevo cliente</a>
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
                                    <th scope="col" class="sort" data-sort="name"></th>
                                    <th scope="col" class="sort" data-sort="budget"></th>
                                    <th scope="col" class="sort" data-sort="status"></th>
                                    <th scope="col">Email</th>
                                    <th></th>
                                </tr>
                            </thead>




                            <tbody class="list">

                                <tr v-for="cliente of clientes">

                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status" hidden>@{{cliente.id}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status">@{{cliente.grupo_id}}</span>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status">@{{cliente.nombre}}</span>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status">@{{cliente.apellido}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <span class="status">@{{cliente.email}}</span>
                                        </span>
                                    </td>


                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" @click="editar(cliente.id)">Actualizar</a>
                                                <a class="dropdown-item" @click="eliminar(cliente.id)">Eliminar</a>


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
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                </li>
                                <li class="page-item active" v-for="pagina in totalpaginas()" @click="getpaginas(pagina)">
                                    <a class="page-link">@{{pagina}}</a>
                                </li>
                                 <li class="page-item active">
                                    <a class="page-link">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>-->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- modal -->

    <div class="col-md-4">
        <div class="modal fade" id="modalcliente" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default" v-if="estado==true">Agregar Cliente</h6>
                        <h6 class="modal-title" id="modal-title-default" v-if="estado==false">Actualizar Cliente</h6>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">




                        <!-- <div class="form-group">
                        <span v-if="!numero">requerido(coloque solo numeros)*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" >Numero</span>
                                </div>
                                <input type="number" v-model="numero" class="form-control"  aria-describedby="basic-addon1" required>
                            </div>
                        </div> -->
                        <div class="form-group">
                        <span v-if="!nombre" class="text-danger">Requerido*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                                </div>
                                <input type="text" v-model="nombre" class="form-control" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="form-group">
                        <span v-if="!apellido" class="text-danger">Requerido*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Apellidos</span>
                                </div>
                                <input type="text" v-model="apellido" class="form-control" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="form-group">
                        <span v-if="!grupo_id" class="text-danger">Requerido*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Grupo</span>
                                </div>

                                <select name="" id="" type="text" v-model="grupo_id" class="form-control" aaria-describedby="basic-addon1" required>
                                    <option  v-for="grupo in grupos"  v-bind:value="grupo.id">@{{grupo.nombre}}</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                        <span v-if="!email" class="text-danger">Requerido*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                <input type="text" v-model="email" class="form-control" placeholder="email"  aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-if="estado==true" @click="Guardar()">Guardar</button>
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
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/clientes.js"></script>
@endpush
