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

                <div class="card" id="Check">
                    <div class="contenedor_cajas">
                    <h1 class="h1-check out">Todas las habitaciones </h1>
                        @foreach($habitaciones as $habitacion)
                        <section class="cajas" >

                            <div class="card" style="width: 18rem;">
                            @if($habitacion->estado == 'Ocupado')
                            <div class="color">
                            @else
                            <div class="color2">
                            @endif
                                <img class="card-img-top" src="{{asset('assets/img/habitacion.jpg')}}" alt="Card image cap">
                                <h3 class="numero_grupo">{{$habitacion->estado}}</h3>
                                <div class="card-body">
                                    <h5 class="card-title">Numero: <p class="numero"> {{$habitacion->numero}}</p> </h5>
                                    @foreach($habitacion->reservaciones as $reservacion)
                                        @if($reservacion->estado == 'Activo')
                                        <p class="form-control col-8">{{$reservacion->grupos->nombre}}</p>
                                        @endif
                                    @endforeach
                                    <h5 class="card-title">Grupo: <p class=""> </p> </h5>
                                    <h5 class="card-title font-weight-bold">Numero de cuartos ocupados </h5>
                                </div>
                                    <div class="col-lg-12 col-5 text-right btn-caja-grupo">
                                        <a href="{{route('habitacion.checkout',['id' => $habitacion->id])}}" class="btn btn-sm btn-primary">Terminar</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endforeach
                        <div class="clearfix">
            {{$habitaciones->links()}}
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
<script>
    new Vue({
        el:"#Check",
        data:{
            prueba:'el check-out esta cargando el vue'
        }
    });
</script>


@endpush


