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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                     
                        <div class="card-body">
                            
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
    
                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
    
 
@endsection
