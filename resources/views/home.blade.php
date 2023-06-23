@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header flex">
                        <h3>Documentos</h3>
                        <a href="{{ route('home.create') }}" class="btn btn-outline-secondary">Crear Documento</a>
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
