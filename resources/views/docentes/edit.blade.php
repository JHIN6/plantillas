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

                    <form action="{{ route('docentes.update', $docente->id) }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">NOMBRE</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $docente->nombre) }}" placeholder="Ingrese el nombre del docente">
                        
                            <!-- error message untuk title -->
                            @error('nombre')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">APELLIDO</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido', $docente->apellido) }}" placeholder="Ingrese el apellido del docente">
                        
                            <!-- Mensaje de rror para el celular -->
                            @error('celular')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">FOTO</label>
                            <input type="file" name="imagen" class="form-control" placeholder="imagen">
                            <img src="{{ asset('image/'.$docente->imagen) }}" width="300px">
                        
                            <!-- Mensaje de error para el correo electrónico -->
                            @error('correo')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">PROFESION</label>
                            <input type="text" class="form-control @error('profesion') is-invalid @enderror" name="profesion" value="{{ old('profesion', $docente->profesion) }}" placeholder="Ingrese la profesion del docente">
                        
                            <!-- Mensaje de error para la parroquia -->
                            @error('parroquia')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">CURSO</label>
                            <input type="text" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{ old('curso', $docente->curso) }}" placeholder="Ingrese el curso del docente">
                        
                            <!-- Mensaje de error para la parroquia -->
                            @error('grupo')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">ACTUALIZAR</button>

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