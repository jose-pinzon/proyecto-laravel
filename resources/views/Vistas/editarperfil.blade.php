@extends('layouts.argon', ['title' => __('User Profile')])

@section('content')

@include('include.partials.header', [
'title' => __('Hola') . ' '. auth()->user()->name.' '.auth()->user()->apellido_p,
'description' => __('Este es tu pagina de perfil, puedes ver tus datos y corregir lo que necesites'),
'class' => 'col-lg-7'
])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image ">

                        </div>
                        <div class="card-profile-image">
                                @if(Auth::user()->avatar)
                                        <img src="{{route('avatar.user',['filename'=> Auth::user()->avatar])}}" class=" rounded-circle" alt="Image placeholder">
                                @endif
                        </div>

                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <!-- <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a> -->
                        <a href="{{route('vista.comment')}}" class="btn btn-sm btn-default float-right">{{ __('comentarios') }}</a>
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <!-- <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                <div>
                                    <span class="heading">22</span>
                                    <span class="description">{{ __('Friends') }}</span>
                                </div>
                                <div>
                                    <span class="heading">10</span>
                                    <span class="description">{{ __('Photos') }}</span>
                                </div>
                                <div>
                                    <span class="heading">89</span>
                                    <span class="description">{{ __('Comments') }}</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            {{ auth()->user()->name }} {{auth()->user()->apellido_p}} {{auth()->user()->apellido_m}}
                        </h3>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>Email: {{ auth()->user()->email }}
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i> Nick: {{ (auth()->user()->nick ) }}
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>{{ __('Shambalante') }}
                        </div>
                        <hr class="my-4" />
                        <!-- <p>{{ __('foto de prueba') }}</p>
                        <a href="#">{{ __('Show more') }}</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Editar Perfil') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('actualizar')}}" autocomplete="on" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('Datos guardados') }}</h6>

                        @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif


                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>





                            <div class="form-group{{ $errors->has('apellido_p') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-apellido_p">{{ __('Apellido Paterno') }}</label>
                                <input type="text" name="apellido_p" id="input-apellido_p" class="form-control form-control-alternative{{ $errors->has('apellido_p') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellido Paterno') }}" value="{{ old('apellido_p', auth()->user()->apellido_p) }}" autofocus>

                                @if ($errors->has('apellido_p'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido_p') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group{{ $errors->has('apellido_m') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-apellido_m">{{ __('Apellido Materno') }}</label>
                                <input type="text" name="apellido_m" id="input-apellido_m" class="form-control form-control-alternative{{ $errors->has('apellido_m') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellido Materno') }}" value="{{ old('apellido_m', auth()->user()->apellido_m) }}" autofocus>

                                @if ($errors->has('apellido_m'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido_m') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group{{ $errors->has('nick') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nick">{{ __('Nick') }}</label>
                                <input type="text" name="nick" id="input-nick" class="form-control form-control-alternative{{ $errors->has('nick') ? ' is-invalid' : '' }}" placeholder="{{ __('Nick') }}" value="{{ old('nick', auth()->user()->nick) }}" autofocus>

                                @if ($errors->has('nick'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nick') }}</strong>
                                </span>
                                @endif
                            </div>






                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <section id="avatar">
                                <div class="form-group{{ $errors->has('avatar') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-avatar">{{ __('Avatar') }}</label>
                                    <input type="file" name="avatar" @change="obtenerImagen" id="input-avatar" class="form-control form-control-alternative{{ $errors->has('avatar') ? ' is-invalid' : '' }}" placeholder="{{ __('Avatar') }}">

                                    @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <figure  class="figura">
                                    <img width="200" :src="imagen2"  height="200" >

                                </figure>
                            </section>


                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                            </div>
                        </div>
                    </form>
                    <hr class="my-4" />
                    <!-- <form method="post" action="" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('Contraseña') }}</h6>

                        @if (session('password_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('password_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-current-password">{{ __('Contraseña actual') }}</label>
                                <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="{{ old('old_password', auth()->user()->password) }}">

                                @if ($errors->has('old_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-password">{{ __('Nueva Contraseña') }}</label>
                                <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-password-confirmation">{{ __('Confirmar nueva contraseña') }}</label>
                                <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Guardar Contraseña') }}</button>
                            </div>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
@push('script')
    <script>
        new Vue({
            el: "#avatar",
            data: {
                imagenCargada:'',
                imagen: '',
            },
            methods:{
                obtenerImagen(e){
                    let file = e.target.files[0];
                    this.imagen=file;
                    this.cargarFile(file);
                },
                cargarFile(file){
                    let reader= new FileReader();

                    reader.onload = (e)=>{
                        this.imagenCargada = e.target.result;
                    }
                    reader.readAsDataURL(file)
                }

            },
            computed:{
                imagen2(){
                    return this.imagenCargada;
                }
            }

        })
    </script>
@endpush
