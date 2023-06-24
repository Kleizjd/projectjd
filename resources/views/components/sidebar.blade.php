
<div class="offcanvas offcanvas-start " tabindex="-1" id="sidebar">
  <div class="offcanvas-header p-4">
      <h5 class="offcanvas-title">Sidebar</h5>
      <button type="button" class="btn-close text-reset" data-bs-dimiss="offcanvas"
          aria-label="Close"></button>
  </div>
</div>
<div class="offcanvas-body">

  <ul class="list-group">
      <li class="list-group-item">
        <i class="fas fa-home"></i>Home - Dashboard</li>
      <li class="list-group-item list-group-item-action list-group-item-light">Noticias</li>
      <li class="list-group-item">Elemento</li>
      <li class="list-group-item">Elemento</li>
      <li class="list-group-item">Elemento</li>
      <li class="list-group-item">Elemento</li>
      <li class="list-group-item">Elemento</li>
      <li class="list-group-item">Elemento</li>
      <li class="list-group-item">Elemento</li>
      <li class="list-group-item">Elemento</li>
      <li class="list-group-item">
        {{-- <a class="nav-link active" href="{{ route('post.show') }}"> --}}
            {{-- <span data-feather="file"></span> --}}
          {{-- <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg> --}}
            News
        </a>
      </li>
      <li class="list-group-item">
        <a class="nav-link" href="{{ route('categories') }}">
          {{-- <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg> --}}
          Categories
        </a>
      </li>
      <li>
        <div class="dropdown">
          {{-- d-flex  --}}
            <a href="#" class="align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
      </li>

  </ul>
</div>
