<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">Laravel Passwordless Auth App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{auth()->user()->name}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" 
                            onclick="document.getElementById('logoutForm').submit()"
                            href="#">Logout</a>
                        <form id="logoutForm" action="{{route('logout')}}" method="post">
                            @csrf
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register.form')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>