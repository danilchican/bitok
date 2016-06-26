@extends('layouts.app')

@section('styles')
    <style>
        .help-block {
            color: #bb230c;
            margin-bottom: 0;
            text-shadow: none;
        }
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

                <div class="col-md-12 cont-in">
                    <div class="panel-heading">
                        <div class="col-md-offset-2">
                            <h2>Registration</h2>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Кто вы</label>

                                <div class="col-md-6">
                                    <select name="type" class="form-control" id="type-reg">
                                        <option value="0">Компания</option>
                                        <option value="1">Клиент</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label name">Имя компании</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Пароль</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Подтверждение пароля</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6" style="margin-left: 18%">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-user"></i> Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var sel = $('select[name="type"]');
            $('select[name="type"]').change(function() {
                var lbl = $('.name');
                switch(sel.val()) {
                    case "0":
                        lbl.text("Имя компании");
                        break;
                    case "1":
                        lbl.text("ФИО");
                        break;
                    default:
                        alert("Something wrong...");
                        break;
                }
            });
        });
    </script>
@endsection