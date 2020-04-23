<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color:LIGHTYELLOW;">
@extends('layouts.app')

@section('content')

    <div class="container" align="center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="into">
                    <div class="card-header" style="background-color:PAPAYAWHIP;" id="into">Tu token, lo necesitas para usar nuestra API.</div>

                    <div class="card-body" id="into">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{$token}}
                    </div>
                    <div class="card-footer" style="background-color:PAPAYAWHIP;" id="into">
                        <a id="fond" class="btn btn-primary" href="/">Volver a inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection    
</body>
</html>
