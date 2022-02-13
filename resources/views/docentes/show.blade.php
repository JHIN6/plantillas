@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Docentes</h1>
@stop

@section('content')
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                    <a href="{{ route('docentes.index') }}" class="btn btn-md btn-success mb-3">REGRESAR</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">DATOS DEL DOCENTE {{ $docente->nombre }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>
                                            <label>APELLIDO : </label><b> {{ $docente->apellido }}</b>
                                        </p>
                                        <p>
                                            <label>FOTO : </label><td><img src="{{ asset('image/'.$docente->imagen) }}" width="150px"></td>
                                        </p>
                                        <p>
                                            <label>PROFESION : </label><b> {{ $docente->profesion }}</b>
                                        </p>
                                        <p>
                                            <label>CURSO : </label><b> {{ $docente->curso }}</b>
                                        <p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@stop