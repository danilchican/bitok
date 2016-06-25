@extends('layouts.app')

@section('styles')
    <style>
        input {
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
              <h1>Paying...</h1>
              <div id="qrcode"></div>
                Hash : {{ $public_address }} <br/>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $amount_btc }}" disabled>
                    <span class="input-group-addon">BTC</span>
                </div>
                <br/>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $amount_bel }}" disabled>
                    <span class="input-group-addon">BYR</span>
                </div>
                <br/>
                <div class="btn-group">
                    <button type="button" class="btn btn-danger">Отменить платеж</button>
                    <button type="button" class="btn btn-info">Проверить</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/js/libs/qrcode/jquery.qrcode.js"></script>
    <script type="text/javascript" src="/js/libs/qrcode/qrcode.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#qrcode').qrcode({
                text : "{{ $public_address }}"
            });
        });

    </script>
@endsection
