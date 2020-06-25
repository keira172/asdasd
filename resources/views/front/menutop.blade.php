<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" style="width: 250px;" href="#">
        <img width="90%" src="{{ asset('img/logo2.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('front.index') }}">Home<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Brands
                </a>
                @if (isset($brands))
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($brands as $brand)
                    <a class="dropdown-item" href="{{ route('brand', $brand->id) }}">{{ $brand->name }}</a>
                    @endforeach
                </div>
                @endif
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('viewCart') }}">Cart <i class="fas fa-cart-plus"></i></a>
            </li>
        </ul>
        <div class="">
            @if (isset(Auth::user()->name))
                <a href="{{ url('/home') }}" style="font-weight: bold;">Hi {{ Auth::user()->name }}</a>
            @else
                @if (Route::has('login'))
                    <li class="nav-item" style="list-style: none">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>&emsp;

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </li>
                @endif
            @endif

        </div>
    </div>
</nav>

