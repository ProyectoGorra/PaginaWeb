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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:MOCCASIN;">Administrar personas</div>

                <div class="card-body" style="background-color:PAPAYAWHIP;">
                    <personas />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
