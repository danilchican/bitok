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
              Paying...
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#qrcodeCanvas').qrcode({
                text : "{{ $public_address }}"
            });
        });

    </script>
@endsection
