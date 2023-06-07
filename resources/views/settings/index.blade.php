@extends('layouts.app')
@section('title', 'Springfield News')

@section('content')
    <div class="container-fluid">
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
        </div>

    </div>

@endsection
