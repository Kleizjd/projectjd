@extends('layouts.app')

@section('title', 'Springfield News')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-3 p-0">
                <aside>
                    @if (Auth::check())
                        {{-- SIDEBAR --}}
                        @include('components.sidebar')
                        {{-- FIN SIDEBAR --}}
                    @endif
                </aside>
            </div>
            <div class="col-9">
                <div class="card shadow-lg mt-2">
                    <div class="badge bg-dark card-header">
                        <div class="row">
                            <h4>
                                <b>Configuracion</b>
                            </h4>
                        </div>
                    </div>

                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav_profile_tab" data-bs-toggle="tab" href="#nav-home" role="tab"
                            aria-controls="nav-home" aria-selected="true">Profile</a>
                        <a class="nav-link" id="nav_user_tab" data-bs-toggle="tab" href="#nav-profile" role="tab"
                            aria-controls="nav-profile" aria-selected="false">Usuarios</a>

                    </ul>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav_profile_tab">
                                <div class="tab-pane active">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session()->get('message'))
                                        <div class="alert alert-success" role="alert">
                                            <strong>Success: </strong>{{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-3 border-right">
                                            {{-- <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                                        class="rounded-circle mt-5" width="150px"
                                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                                        class="font-weight-bold">Edogaru</span><span
                                                        class="text-black-50">edogaru@mail.com.my</span><span> </span></div> --}}
                                            <label for="photo">
                                                <?php if (!empty(Auth::user()->image->url)) : ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                            <img id="img_preview"
                                                                src="{{ asset(Auth::user()->image->url) }}" height="150px"
                                                                width="150px">
                                                            <span class="font-weight-bold">{{ Auth::user()->name }}'s
                                                                Profile</span>
                                                            <span class="text-black-50">{{ Auth::user()->email }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php else : ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                            <img id="img_preview"
                                                                src="{{ asset('images/users/user_profile.png') }}"
                                                                height="150px" width="150px">
                                                            <span class="font-weight-bold">{{ Auth::user()->name }}'s
                                                            </span>
                                                            <span class="text-black-50">{{ Auth::user()->email }}</span>

                                                        </div>
                                                    </div>
                                                </div>

                                                <?php endif; ?>
                                                <input type="file" name="photo" id="photo" accept="image/*"
                                                    style="display: none;">
                                                @error('photo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="col-md-5 border-right">
                                            <div class="">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="text-right">Configuraciones de Perfil</h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6"><label class="labels">*Nombre</label><input
                                                            type="text" class="form-control" placeholder="nombre"
                                                            value=""></div>
                                                    <div class="col-md-6"><label class="labels">*Apellido</label><input
                                                            type="text" class="form-control" value=""
                                                            placeholder="apellido"></div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-12"><label class="labels">Correo</label><input
                                                            type="text" class="form-control"
                                                            placeholder="Ingresa tu correo" value=""></div>
                                                    <div class="col-md-12"><label class="labels">Telefono
                                                            celular</label><input type="text" class="form-control"
                                                            placeholder="ingrese su numero telefonico" value=""></div>
                                                    <div class="col-md-12"><label
                                                            class="labels">Educaci&oacute;n</label><input type="text"
                                                            class="form-control" placeholder="educaci&oacute;n"
                                                            value="">
                                                    </div>
                                                    <div class="col-md-12"><label
                                                            class="labels">Direcci&oacute;n</label><input type="text"
                                                            class="form-control" placeholder="direcci&oacute;n"
                                                            value=""></div>
                                                    <div class="row">
                                                        <div class="col-md-6"><label class="labels">Ciudad</label><input
                                                                type="text" class="form-control" placeholder="ciudad"
                                                                value=""></div>
                                                        <div class="col-md-6"><label
                                                                class="labels">Pa&iacute;s</label><input type="text"
                                                                class="form-control" placeholder="country"
                                                                value=""></div>
                                                    </div>
                                                </div>
                                                <div class="mt-5 text-center"><button
                                                        class="btn btn-primary profile-button"
                                                        type="button">Guardar</button></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-3 py-5">
                                                <form action="{{ route('password-update') }}" method="POST">
                                                    @csrf
                                                    @if (session('error'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label for="new_password"><strong>New password:</strong></label>
                                                        <input type="password" class="form-control" id="new_password"
                                                            name="new_password">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="password_confirm"><strong>Confirm
                                                                Password:</strong></label>
                                                        <input type="password" class="form-control"
                                                            id="password_confirmed" name="password_confirmed">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Update
                                                        Password</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show"active id="nav-profile" role="tabpanel"
                                aria-labelledby="nav_user_tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <div class="newSearch pb-2" id="containerModalSearchProduct">
                                                <h3 class="w-100 modal-title">Búsqueda de usuarios</h3>

                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modalUsuario"><i class="fa fa-save">Crear
                                                        Usuario</i></button>
                                            </div>

                                            <table id="tableSearchUser" class="table-bordered table-hover"
                                                width="100%">

                                                <thead id="table_usuarios"
                                                    class="table text-white bg-primary thead-primary">
                                                    <thead class="bg-primary  text-white">

                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Correo</th>
                                                            <th>Nombre Completo</th>
                                                            <th>Estado</th>
                                                            <th>Rol</th>
                                                            <th>Ver</th>
                                                            <th>Acciones</th>

                                                        </tr>
                                                    </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->status }}</td>
                                                            <td>{{ $user->rol }}</td>
                                                            <td>
                                                                <form action="#" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="text-white btn btn-info"><i
                                                                            class="fa fa-eye"></i></button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                {{-- <form action="{{ route('user.edit', $user->id) }}" method="POST"> --}}

                                                                <a href="#" class="btn btn-info">Editar</a>
                                                                <button type="button"
                                                                    class="text-white btn btn-warning"><i
                                                                        class="fa fa-edit"></i></button>
                                                                <a href="/user/{{ $user->id }}/edit"
                                                                    class="btn btn-info">Editar</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Borrar</button>
                                                                {{-- </form> --}}
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('settings.modal.createUser')
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
<script>
    // Obtener referencia al input y a la imagen
    window.onload = function() {
        const $seleccionArchivos = document.querySelector("#photo"),
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
            document.getElementById("perfil").src = objectURL;
            document.getElementById("perfil2").src = objectURL;

        });
        // PONER IMAGEN CUANDO SE CREE UN USUARIO
        const $seleccionArchivo = document.querySelector("#photo2"),
            $imagenPrevisualiza = document.querySelector("#img_preview2");

        $seleccionArchivo.addEventListener("change", () => {
            const archivo = $seleccionArchivo.files;
            if (!archivo || !archivo.length) {
                $imagenPrevisualiza.src = "";
                return;
            }
            const sachivo = archivo[0];
            const objtURL = URL.createObjectURL(sachivo);
            $imagenPrevisualiza.src = objtURL;
        });
    }
</script>
