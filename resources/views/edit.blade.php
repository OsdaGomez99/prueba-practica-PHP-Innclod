@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar Documento</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>¡Revise todos los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge bg-danger">{{ $error }}</span>
                                    @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('home.update', $doc->DOC_ID) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group p-2">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="DOC_NOMBRE" id="nombre" placeholder="" value="{{$doc->DOC_NOMBRE}}" maxlength="60" oninput="transformarMayusculas(this)">
                                    </div>
                                    <div class="col">
                                        <label for="contenido">Contenido</label>
                                        <textarea type="textarea" class="form-control" name="DOC_CONTENIDO" id="contenido" placeholder="" maxlength="4000">{{$doc->DOC_CONTENIDO}}</textarea>
                                    </div>
                                    <div class="col">
                                        <label for="doc_tipo">Tipo de Documento</label>
                                        <select name="DOC_ID_TIPO" id="doc_tipo" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->TIP_ID }}"
                                                    @if ($tipo->TIP_ID == $doc->DOC_ID_TIPO)
                                                        selected
                                                    @endif>
                                                    {{$tipo->TIP_NOMBRE}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="doc_pro">Tipo de Proceso</label>
                                        <select name="DOC_ID_PROCESO" id="doc_pro" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            @foreach ($pros as $pro)
                                                <option value="{{ $pro->PRO_ID }}"
                                                    @if ($pro->PRO_ID == $doc->DOC_ID_PROCESO)
                                                        selected
                                                    @endif>
                                                    {{$pro->PRO_NOMBRE}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group p-2">
                               <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                <a href="{{ route('home.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function transformarMayusculas(input) {
            input.value = input.value.toUpperCase();
        }
    </script>
@endsection
