@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/wallpaper.jpg') }}'); background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card-signup" style = "background-color: rgba(41, 36, 36, 0.51)">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="card" style="background-color: rgba(226, 147, 221, 0.3)">
                          <div class="text-center" style="color: rgb(222, 184, 222)">
                              <h4>Inicio de sesión</h4>
                          </div>
                        </div>
                        <!--p class="text-divider">Ingresa tus datos</p-->
                        <div class="content">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons" style="color:rgb(222, 184, 222); background-color: rgba(255, 255, 255, 0)">fingerprint</i>
                                </span>
                                <input id="username" type="text" placeholder="Username" class="form-control" style="color:rgb(255, 255, 255)" name="username" value="{{ old('username') }}" required autofocus>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons" style="color:rgb(222, 184, 222); background-color: rgba(255, 255, 255, 0)">lock_outline</i>
                                </span>
                                <input placeholder="Contraseña" id="password" type="password" class="form-control" style="color:rgb(255, 255, 255)" name="password" required />
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" checked name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Recordar sesión
                                </label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-md" style="color:rgb(222, 184, 222); background-color: rgba(144, 56, 143, 0.38)">Ingresar</a>
                        </div>
                        <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password? -->
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
</div>
@endsection
