@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/signup.css">
    {{-- <section> --}}
    <div class="container">
    <div class="row d-flex justify-content-center align-items-center">      
        <div class="col-sm-6 d-none d-xl-block d-flex">
            <img src="images/team2.png" alt="Sample photo" class="img-fluid" />
        </div>

                    <div class="col-sm-6 d-none d-xl-block d-flex">
                        <div class="card-body p-md-5 text-black">
                            <h3 class="mb-5 text-uppercase">Registro</h3>
                            {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                            <form method="POST" action="{{ route('register') }}" autocomplete="off">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-4"></div>

                                    <div class="col-md-6 ">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        <label class="form-label" for="name">Nombre</label>
                                        {{-- <label class="form-label" for="name">{{ __('Name') }}</label> --}}

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            <label class="form-label" for="email">Correo Electronico</label>
                                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4"></div>


                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">
                                            <label class="form-label" for="password">Contraseña</label>
                                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4"></div>


                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                            <label class="form-label" for="password_confirmation">Contraseña</label>
                                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> --}}

                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-4"></div>

                                        <div class="col-md-6 mb-4">
                                            <div class="d-flex justify-content-end pt-3">
                                                <div class="d-flex justify-content-end pt-3">
                                                    <button type="reset" class="btn btn-light btn-lg">Reset</button>
                                                    <button type="submit"
                                                        class="btn btn-warning btn-lg ms-2">Enviar</button>
                                                    {{-- <button type="submit" class="btn btn-primary">{{ __('Register') }}</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            {{-- <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="text" id="form3Example1m1" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example1m1">Mother's name</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <input type="text" id="form3Example1n1" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example1n1">Father's name</label>
                                </div>
                            </div>
                            </div> 
                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example8" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example8">Address</label>
                            </div>

                            <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                <h6 class="mb-0 me-4">Gender: </h6>

                                <div class="form-check form-check-inline mb-0 me-4">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                                        value="option1" />
                                    <label class="form-check-label" for="femaleGender">Female</label>
                                </div>

                                <div class="form-check form-check-inline mb-0 me-4">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                                        value="option2" />
                                    <label class="form-check-label" for="maleGender">Male</label>
                                </div>

                                <div class="form-check form-check-inline mb-0">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                                        value="option3" />
                                    <label class="form-check-label" for="otherGender">Other</label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <select class="select">
                                        <option value="1">State</option>
                                        <option value="2">Option 1</option>
                                        <option value="3">Option 2</option>
                                        <option value="4">Option 3</option>
                                    </select>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <select class="select">
                                        <option value="1">City</option>
                                        <option value="2">Option 1</option>
                                        <option value="3">Option 2</option>
                                        <option value="4">Option 3</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example9" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example9">DOB</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example90" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example90">Pincode</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example99" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example99">Course</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example97" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example97">Email ID</label>
                            </div> --}}


                        </div>
                    </div>
                
            
        
    </div>
    </div>
    {{-- </section> --}}
@endsection
