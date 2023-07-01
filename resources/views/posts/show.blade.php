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
                        <div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
                            <div class="modal-content">

                                <div class="text-center modal-header">
                                    <h3 class="w-100 modal-title">Búsqueda de Noticias</h3>
                                    <button type="button" class="close" data-dismiss="modal" title="Cerrar">
                                        <i class="fa fa-window-close fa-2x text-danger"></i>
                                    </button>
                                </div>

                                <div class="card-body">
                                    <form method="POST" id="frm_SearchNoticia" action="" autocomplete="off">
                                        <div class="container-fluid">

                                            <div class="align-items-center pb-4  row">

                                                <div class="row ">
                                                    <div class="col-3">
                                                        <label class="font-weight-bold"
                                                            for="categoria_noticia">Categoria</label>

                                                    </div>
                                                    <div class="p-1 col-7">
                                                        <select name="categoria_noticia" id="categoria_noticia"
                                                            class="form-control">
                                                            <option value="">Seleccione ...</option>
                                                            <option value="1">Moda y Farandula</option>
                                                            <option value="2">Politica</option>
                                                            <option value="3">Tecnologia</option>
                                                            <option value="4">Deportes</option>
                                                            <option value="T">Todos</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-2 ">
                                                        <button type="submit" class="px-3 py-2 btn btn-primary"
                                                            title="Buscar">
                                                            <i class="fa fa-search"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="container">
                                    <div class="newSearch" id="containerModalSearchProduct" style="display: none;">
                                        <table id="tableModalSearchNoticia" class="table-bordered table-hover"
                                            width="100%">

                                            <thead class="table text-white bg-primary thead-primary">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>titulo</th>
                                                    <th>categoria</th>
                                                    <th>Descripcion</th>
                                                    <th>Ver</th>
                                                    <th>Editar</th>

                                                </tr>
                                            </thead>

                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
