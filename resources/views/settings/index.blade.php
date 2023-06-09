@extends('layouts.app')

@section('title', 'Springfield News')

@section('content')

    <div class="container-fluid">
        <div class="row ">
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
                <main style="margin-top:80px">
                    <div class="card shadow-lg mt-2">
                        <div class="badge bg-dark card-header">
                            <div class="row">
                                <h4>
                                    <b>Configuracion</b>
                                </h4>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav_profile_tab" data-bs-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
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

                                            <div class="col-6">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @endif
                                                <form action="{{ route('home') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-header text-center">
                                                        <div class="font-weight-bold">{{ Auth::user()->name }}'s Profile
                                                        </div>
                                                        <div
                                                            class="img__wrap border btn btn-outline-white d-flex justify-content-center">
                                                            <label for="photo">
                                                                <?php if (!empty(Auth::user()->image->url)) : ?>
                                                                <i class="far fa-edit img__description">Cambiar</i>
                                                                <div
                                                                    class="img__wrap border border-dark btn btn-outline-white d-flex justify-content-center">
                                                                    <img class="img-responsive" id="img_preview"
                                                                        src="{{ asset(Auth::user()->image->url) }}"
                                                                        height="190" width="190">
                                                                </div>
                                                                <?php else : ?>
                                                                <i class="far fa-edit img__description">Cambiar</i>
                                                                <div
                                                                    class="img__wrap border border-dark btn btn-outline-white d-flex justify-content-center">
                                                                    <img class="img-responsive" id="img_preview"
                                                                        src="{{ asset('image/user_profile.png') }}"
                                                                        height="190" width="190">
                                                                </div>
                                                                <?php endif; ?>
                                                                <input type="file" name="photo" id="photo"
                                                                    accept="image/*" style="display: none;">
                                                                @error('photo')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name"><strong>Name:</strong></label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ Auth::user()->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email"><strong>Email:</strong></label>
                                                        <input type="text" class="form-control" id="email"
                                                            value="{{ Auth::user()->email }}" name="email">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                                </form>
                                            </div>
                                            <div class="col">

                                                <form action="{{ route('password-update') }}" method="POST">
                                                    @csrf
                                                    @if (session('error'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif

                                                    <div class="form-group">
                                                        <label for="email"><strong>Current Password:</strong></label>
                                                        <input type="password" class="form-control" id="old_password"
                                                            name="old_password">
                                                    </div>
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

                                                    {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-{{ $new->id }}">Ver Noticia</button> --}}
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
                </main>
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
