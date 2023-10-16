@php

    use Illuminate\Support\Facades\Auth;
    $user =  Auth::user();
    if($user !== null) {
        $dashboardRoute = $user->getRedirectRoute();
    }
@endphp
<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="/">Home</a>
        <a class="nav-item nav-link" href="{{route('products.index')}}">Products</a>
        @auth
            <a class="nav-item nav-link" href="{{route($dashboardRoute)}}">Dashboard</a>
            <a class="nav-item nav-link" href="{{ route('logout') }}">Logout</a>

        @else

            <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
</nav>
