@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row row-cols-2">
                            <div class="col">
                                <a href="{{ route('home.create') }}" class="btn btn-outline-secondary">Crear Documento</a>
                            </div>
                            <div class="col">
                                <form action="{{ route('home.index') }}" method="GET" class="mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>DOCUMENTO</th>
                                        <th>PROCESO</th>
                                        <th>TIPO</th>
                                        <th>CODIGO</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($docs as $doc)
                                        <tr>
                                            <td>{{ $doc->DOC_NOMBRE }}</td>
                                            <td>({{$doc->proceso->PRO_PREFIJO}}) {{ $doc->proceso->PRO_NOMBRE }}</td>
                                            <td>({{$doc->tipo->TIP_PREFIJO}}) {{ $doc->tipo->TIP_NOMBRE }}</td>
                                            <td>{{ $doc->DOC_CODIGO }}</td>
                                            <td>
                                                <form action="{{ route('home.destroy', $doc->DOC_ID) }}" method="POST" >
                                                    <a href="{{ route('home.edit', $doc->DOC_ID) }}">
                                                        <a type="button" class="btn btn-outline-warning btn-sm" href="{{ route('home.edit', $doc->DOC_ID) }}">
                                                            <i class='fa fa-edit'></i>
                                                        </a>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class='fa fa-times'></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="8">
                                                NO HAY DOCUMENTOS REGISTRADOS
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{$docs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
