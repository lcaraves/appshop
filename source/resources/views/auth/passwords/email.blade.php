@extends('layouts.app')

@section('htmlheader_title', 'Olvidaste Contraseña')
@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/city.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <h4>Resetear Contraseña</h4>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="text-divider">Ingresa tú Correo Electrónico</p>
                        <div class="content">
                            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Correo Electrónico">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary">
                                Enviar Enlace para Resetear Contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                       About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                       Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy;{{date('Y')}} , made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com" target="_blank">Creative Tim</a>
        </div>
    </div>
    </footer>

</div>
@endsection
