<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 ">
    <div class="container-fluid">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="./">
            <span>
                <img src="{{ asset('storage/uploads/logo.jpg') }}" height="50" width="200">
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li>
                    <div class="d-flex no-block align-items-center p-15 bg-dark text-white m-b-10">

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       
                        @if (!empty(Auth::user()->photo))
                            <img src="{{ asset(Auth::user()->photo) }}" id="perfil2" alt="user" class="img-circle"
                                width="60">
                        @else
                            <img src="{{ asset('images/upload-user.svg') }}" alt="user" class="img-circle"
                                width="60">
                        @endif


                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <div class="d-flex no-block align-items-center p-15 bg-dark text-white m-b-10">
                            <a href="{{ route('settings') }}">
                                @if (!empty(Auth::user()->photo))
                                    <img src="{{ asset(Auth::user()->photo) }}" id="perfil2" alt="user"
                                        class="img-circle" width="60">
                                @else
                                    <img src="{{ asset('images/upload-user.svg') }}" alt="user" class="img-circle"
                                        width="60">
                                @endif
                            </a>
                            <div class="m-l-10">
                                <h7 class="m-b-0">{{ Auth::user()->name }}</h7>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
