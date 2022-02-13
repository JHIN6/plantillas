@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Docentes</h1>
@stop

@section('content')
<body style="background: lightgray">

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">

                    <a href="{{ route('docentes.index') }}" class="btn btn-md btn-success mb-3">REGRESAR</a>

                    <form action="{{ route('docentes.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">NOMBRE</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese el nombre del docente">
                        
                            <!-- Mensaje de error para el nombre -->
                            @error('nombre')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">APELLIDO</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" placeholder="Ingrese el número de apellido del docente">
                        
                            <!-- Mensaje de rror para el apellido -->
                            @error('apellido')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">IMAGEN</label>
                            <input type="file" name="imagen" class="form-control" placeholder="imagen">
                        
                            <!-- Mensaje de error para el nombre -->
                            @error('correo')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">PROFESION</label>
                            <input type="text" class="form-control @error('profesion') is-invalid @enderror" name="profesion" value="{{ old('profesion') }}" placeholder="Ingrese la profesion del docente">
                        
                            <!-- Mensaje de error para el nombre -->
                            @error('profesion')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GRUPO</label>
                            <input type="text" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{ old('curso') }}" placeholder="Ingrese el curso del docente">
                        
                            <!-- Mensaje de error para el nombre -->
                            @error('curso')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">GUARDAR</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@stop

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@stop