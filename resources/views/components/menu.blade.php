<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto active" href="{{ route('homepage') }}">Home</a></li>
        <li><a class="nav-link scrollto" href="{{ route('users.index') }}">Users</a></li>
        <li><a class="nav-link scrollto" href="{{ route('projects.index') }}">Projects</a></li>
        @auth
            <li><a class="nav-link scrollto" href="{{ route('projects.create') }}">Create Project</a></li>
        @endauth
        <li class="nav-link scrollto"><a href="{{ route('tasks.index') }}"><span>Tasks</span></a></li>
        @guest
            <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
            <li><a class="getstarted scrollto" href="{{ route('register') }}">Register</a></li>
        @endguest
        @auth
            @if(auth()->user()->hasRole('admin'))
                <li class="btn ml-lg-auto btn-bordered-white">
                    <a href="{{ route('admin.index') }}" class="getstarted scrollto">Admin</a>
                </li>
            @endif

            <li class="btn ml-lg-auto btn-bordered-white">
                <a href="#" onclick="document.querySelector('#logout').submit()" class="getstarted scrollto">Logout</a>
            </li>
            <li class="btn ml-lg-auto btn-bordered-white">
                <a href="{{ route('users.show', auth()->user()->id) }}" class="getstarted scrollto">Account</a>
            </li>
        @endauth
    </ul>
    <form action="{{ route('logout') }}" method="POST" id="logout">
        @csrf
    </form>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
