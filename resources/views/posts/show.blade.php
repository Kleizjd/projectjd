@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-3 p-0">
                @if (Auth::check())
                    @include('components.sidebar')
                @endif
            </div> --}}

            {{-- <div class="col-9"> --}}
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Detalles de la noticia</h4>
                    </div>
                    {{-- <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Contact Details</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="fa fa-plus-circle"></i> Create New</button>
                        </div>
                    </div> --}}
                </div>
            
                <div class="row">
                    <div class="col-lg-3 col-xlg-3 col-md-3">
                            <img class="card-img" src="{{ asset('images/background/socialbg.jpg') }}" height="456"
                                alt="Card image">
                                <small class="text-muted p-t-30 db">Social Profile</small>

                                <br>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                    </div>
                    <div class="col-lg-3 col-xlg-3 col-md-3">
                        
                                {{-- <small class="text-muted">Email address</small> --}}
                                <h3>Enfermedades por el dulce</h3>
                        
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi libero doloribus earum, maxime minima consequuntur, voluptatum, optio consequatur ea fugiat repellat tenetur molestiae incidunt magni totam veritatis ut debitis eius?Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet neque eius eveniet? Repellat ipsam eligendi sunt et voluptate quia quidem laudantium similique amet, numquam eius sint. Incidunt iste labore cupiditate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores iusto id officiis porro quae illum, doloremque illo reiciendis? Sed repudiandae commodi molestiae! Rem aspernatur quis saepe minima quidem. Illum, minima!</p>
                                <br>
                   


                    </div>
                    <div class="col-lg-6 col-xlg-6 col-md-6">
                        <div class="card">
                            
                                    <div class="card-body">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Realice un comentario" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                            <div class="input-group-prepend ">
                                                <button class="btn btn-primary" id="btnGroupAddon" type="submit">
                                                    <i class="far fa-paper-plane"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <br>
                                            <div class="sl-item">
                                                <div class="sl-left">
                                                    <img src="{{ asset('images/users/1.jpg') }}" width="50"
                                                        alt="user" class="rounded-circle">
                                                    <a href="javascript:void(0)" class="link">John Doe</a>
                                                    {{-- <span class="sl-date">5 minutes ago</span> --}}

                                                </div>
                                                <div class="sl-right">


                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 m-b-20">
                                                            <p>Type your note, and hit enter to add it </p>

                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-1 m-b-20">
                                                            <div class="" id="accordionFlushExample">
                                                                <div class="accordion-item">
                                                                    <h3 class="accordion-header" id="flush-headingOne">
                                                                        <a class="accordion-button collapsed" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#flush-collapseOne"
                                                                            aria-expanded="false"
                                                                            aria-controls="flush-collapseOne">
                                                                            2 comment
                                                                        </a>

                                                                    </h3>


                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 m-b-20">
                                                            <a href="javascript:void(0)" class="link m-r-10"><i
                                                                    class="fa fa-heart text-danger"></i> 5 Love</a>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingOne"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">Placeholder content for this
                                                                    accordion, which is intended to demonstrate the
                                                                    <code>.accordion-flush</code> class. This is the
                                                                    first item's accordion body.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>









                                                </div>
                                                {{-- <div class="vr"></div> --}}
                                                <hr>
                                                <div class="sl-item">

                                                    <div class="sl-left">
                                                        <img src="{{ asset('images/users/2.jpg') }}" width="50"
                                                            alt="user" class="rounded-circle">
                                                        <a href="javascript:void(0)" class="link">John Doe</a>
                                                        <span class="sl-date">5 minutes ago</span>
                                                    </div>
                                                    <div class="sl-right">

                                                        <div>
                                                            <p>Ando desarrollando</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                              
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>
    @endsection
