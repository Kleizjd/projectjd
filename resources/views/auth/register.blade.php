@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/signup.css">
    <style>
        /* .imagen-container {
            height: 80vh;
        }

        .imagen-container img {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .imagen-center {
            display: flex;
            justify-content: center;
            align-items: center;
        } */
    </style>
    {{-- <section> --}}
        <main>
            <div class="container">
              <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                  {{-- <img src="images/team.png" alt="Descripción de la imagen" class="img-fluid mx-auto"> --}}
                  <div class="col-lg-6 d-flex align-items-center bg-cover" style="background-image: url('{{ asset('images/team.png') }}');">
                    <!-- No se necesita una etiqueta de imagen aquí -->
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- Contenido adicional de la segunda columna -->
                  <h2>Título del contenido adicional</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec augue et dolor fringilla lacinia. Sed consectetur, magna eu pulvinar sollicitudin, urna nisi ultrices nunc, nec convallis nunc ligula a nibh.</p>
                </div>
              </div>
            </div>
          </main>
          
    {{-- </section> --}}
@endsection
