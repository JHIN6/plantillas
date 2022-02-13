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
                        <a href="{{ route('docentes.create') }}" class="btn btn-md btn-success mb-3">NUEVO DOCENTE</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">APELLIDO</th>
                                <th scope="col">FOTO</th>
                                <th scope="col">PROFESION</th>
                                <th scope="col">CURSO</th>
                                <th scope="col">ACCIONES</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($docentes as $docente)
                                <tr>
                                    <td>{{ $docente->nombre }}</td>                                
                                    <td>{{ $docente->apellido }}</td>
                                    <td><img src="{{ asset('image/'.$docente->imagen) }}" width="150px"></td>
                                    <td>{{ $docente->profesion }}</td>
                                    <td>{{ $docente->curso }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('¿Está seguro?');" action="{{ route('docentes.destroy', $docente->id) }}" method="POST">
                                            <a href="{{ route('docentes.show', $docente->id) }}" class="btn btn-sm btn-info">MOSTRAR</a>
                                            <a href="{{ route('docentes.edit', $docente->id) }}" class="btn btn-sm btn-primary">EDITAR</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">ELIMINAR</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                  Los datos de los docentes aún no están disponibles.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $docentes->links() }}
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

    <script>
        //Mensaje
        @if(session()-> has('success'))
        
            toastr.success('{{ session('success') }}', 'ÉXITO'); 

        @elseif(session()-> has('error'))

            toastr.error('{{ session('error') }}', 'ERROR'); 
            
        @endif
    </script>
@stop