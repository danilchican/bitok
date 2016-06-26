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
                    <button type="button" class="btn btn-info" id="check-btn">Проверить</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#qrcode').qrcode({
                text : "{{ $public_address }}"
            });

            $('#check-btn').on('click', function (e) {
                e.preventDefault();

                var id = $('input.cat-id').val();

                // data
                // допилить проверку

                $.ajax({
                    url: "{{ route('account.check') }}",
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function() {
                        $('.alert').remove();
                        $('#check-btn').button('loading');
                    },
                    data: {
                        id: id,
                    },
                    error: function(data)
                    {
                        var errors = data.responseJSON;
                        var errorsHtml = "";
                        if(data.success != undefined) {
                            errorsHtml += "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p>" + errors.msg + "</p></div>"; //showing only the first error.
                        } else {
                            $.each(errors, function (key, value) {
                                errorsHtml += "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p>" + value[0] + "</p></div>"; //showing only the first error.
                            });
                        }
                        $('.box-body').before(errorsHtml);
                    },
                    success: function(data) {
                        $('.box-body').before("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p>" + data.msg + "</p></div>");

                    }
            })
                    .always(function() {
                            $('#check-btn').button('reset');
                        });

            });


        });

    </script>
@endsection
