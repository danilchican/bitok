@extends('layouts.app')

@section('styles')
    <style>

    </style>
    @endsection

@section('content')
    <div class="site-wrapper">

        <div class="site-wrapper-inner">

            <div class="cover-container">

                <div class="masthead clearfix">
                    <div class="inner">
                        <h2 class="masthead-brand">BitOK.by</h2>
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="{{ url('/') }}">Главная</a></li>
                            <li><a href="{{ url('/register') }}">Регистрация</a></li>
                            <li><a href="#">О нас</a></li>
                        </ul>
                    </div>

                </div>

                <div class="inner cover">
                    <div class="col-md-6">

                        <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <h2 class="form-signin-heading">Вход в систему</h2>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="sr-only">E-Mail</label>
                                    <input id="inputEmail" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="sr-only">Password</label>

                                    <input id="inputPassword" type="password" class="form-control" name="password" placeholder="Пароль" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="col-md-12" style="margin-bottom:10px">
                                <a href="{{ url('/password/reset') }}" style="float:left">Забыли пароль?</a>
                                <a href="{{ url('/register') }}" style="float:right">Регистрация</a>
                            </div>

                            <button class="btn btn-lg btn-default btn-block" type="submit">Вход</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
