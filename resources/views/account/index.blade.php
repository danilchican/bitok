@extends('layouts.app')

@section('styles')
<style>
    input, .input-group {
        margin-bottom: 10px;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::open(array('url' => route('account.generate'), 'id' => 'socials-form', null, 'class' => 'form-signin')) !!}
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control" placeholder="Номер телефона" autofocus>
                <div class="input-group">
                    <input type="number" name="price" step="any" id="price" class="form-control" placeholder="Стоимость заказа">
                    <span class="input-group-addon">BYR</span>
                </div>
                <button class="btn btn-lg btn-primary btn-block" id="generate-btn" type="submit">Сгенерировать</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
          //  $('#generate-btn').bind('click', function() {
           //     $('#generate-btn').button('loading');
           // });
        });
    </script>
@endsection
