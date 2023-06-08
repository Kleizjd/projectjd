<link href="css/sidebar.css" rel="stylesheet">

    <div class="sidebar">
        <!-- Sidebar content here -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="">
                    {{-- <a class="nav-link active" href="{{ route('main') }}"> --}}
                    <span data-feather="home"></span>
                    <i class="fas fa-home"> Home - Dashboard</i>
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="">
                    {{-- href="{{ route('news') }}"> --}}
                    <span data-feather="file"></span>
                    News
                </a>
            </li>

            <li class="nav-item">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="">
                    {{-- href="{{ route('categories') }}"> --}}
                    <span data-feather="file"></span>
                    Categories
                </a>
            </li>
        </ul>
    </div>




<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
