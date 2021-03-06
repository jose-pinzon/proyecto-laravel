
@extends('layouts.main', ['class' => 'bg-default'])

@section('content')
@include('layouts.headers.guest')

<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-5">
                    <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Sign up with') }}</small></div>
                    <div class="text-center">
                        <a href="#" class="btn btn-neutral btn-icon mr-4">
                            <span class="btn-inner--icon"><img src="{{ asset('assets/img/icons/common/github.svg') }}"></span>
                            <span class="btn-inner--text">{{ __('Github') }}</span>
                        </a>
                        <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="{{ asset('assets/img/icons/common/google.svg') }}"></span>
                            <span class="btn-inner--text">{{ __('Google') }}</span>
                        </a>
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <small>{{ __('Or sign up with credentials') }}</small>
                    </div>
                    <form role="form" method="POST" action="{{ route('register') }}">
                        @csrf



                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>




                        <div class="form-group{{ $errors->has('apellido_p') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('apellido_p') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellido Paterno') }}" type="text" name="apellido_p" value="{{ old('apellido_p') }}" required autofocus>
                            </div>
                            @if ($errors->has('apellido_p'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('apellido_p') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('apellido_m') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('apellido_m') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellido Materno') }}" type="text" name="apellido_m" value="{{ old('apellido_m') }}" required autofocus>
                            </div>
                            @if ($errors->has('apellido_m'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('apellido_m') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('nick') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}" placeholder="{{ __('Nick') }}" type="text" name="nick" value="{{ old('nick') }}" required autofocus>
                            </div>
                            @if ($errors->has('nick'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('nick') }}</strong>
                            </span>
                            @endif
                        </div>
















                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>




                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                            </div>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="text-muted font-italic">
                            <small>{{ __('password strength') }}: <span class="text-success font-weight-700">{{ __('strong') }}strong</span></small>
                        </div>


                        <div class="row my-4">
                            <div class="col-12">
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                    <label class="custom-control-label" for="customCheckRegister">
                                        <span class="text-muted">{{ __('I agree with the') }} <a href="#!">{{ __('Privacy Policy') }}</a></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
