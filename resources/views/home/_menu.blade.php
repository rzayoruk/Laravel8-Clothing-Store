<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="{{route('home_index')}}" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{route('home_index')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('home_index')}}" class="nav-item nav-link">Shop</a>
                <a href="{{route('aboutus')}}" class="nav-item nav-link">About Us</a>
                <a href="{{route('references')}}" class="nav-item nav-link">References</a>
                <a href="{{route('faq')}}" class="nav-item nav-link">FAQ</a>
                <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            <div class="navbar-nav ml-auto placeholder-yellow-900">
            @auth
                    <a href="{{route('myprofile')}}"><p>{{Auth::user()->name}}</p></a>
                    <a href="{{route('logout')}}">Logout</a>
            @endauth
                @guest()
                    <a href="/login" class="nav-item nav-link">Login</a>
                    <a href="/register" class="nav-item nav-link">Register</a>
                @endguest
            </div>
        </div>
    </nav>


