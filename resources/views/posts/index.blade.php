@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 p-0">
                @if (Auth::check())
                {{-- SIDEBAR --}}
                @include('components.sidebar')
                {{-- FIN SIDEBAR --}}
                @endif
            </div>
       
            <div class="col-9">
                <div class="card">
                    <div class="card-header headerRegister">
                        <h5 class="card-title" id="titleModal">Nueva Noticia</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif
                            {{-- @error('name')
                                <h6 class="alert alert-danger">{{ $message }}</h6>
                            @enderror --}}
                            <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
                            {{-- <div class="row pb-3">
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" title="Buscar"
                                        data-target="#modalNoticia"><i class="fa fa-search"></i></button>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="titulo">Notice<span class="required">*</span></label>
                                        <input class="form-control" id="txtTitulo" name="txtTitulo" type="text"
                                            placeholder="Titulo" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Descripción <span class="required">*</span></label>
                                        <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2"
                                            placeholder="Descripción de la Noticia" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category<span class="required">*</span></label>
                                        <select name="category_id" class="form-control selectpicker" id="categoria"
                                            name="categoria">
                                            <option value="">Seleccione ...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
        
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="foto">
                                        <div class="img__wrap border border-dark btn btn-outline-white d-flex justify-content-center">
                                            <img class="img-responsive" id="img_preview" class="img-responsive"
                                                src="{{ asset('storage/uploads/portada_noticia.png') }}" height="250"
                                                width="250">
                                        </div>
                                    </label>
                                    <input id="foto" name="foto" type="file" accept="image/*" style="display: none;" />
                                </div>
        
                                @error('foto')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
        
                            </div>
                    </div>
        
                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText"
                                title="Crear Noticia">Guardar</span></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script>
    // Obtener referencia al input y a la imagen
    window.onload = function() {
        const $seleccionArchivos = document.querySelector("#foto"),
            $imagenPrevisualizacion = document.querySelector("#img_preview");

        // Escuchar cuando cambie
        $seleccionArchivos.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionArchivos.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenPrevisualizacion.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenPrevisualizacion.src = objectURL;
        });
    }
</script>
