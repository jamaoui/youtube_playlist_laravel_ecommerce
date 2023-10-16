<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') | {{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>


@include('shared.nav')
<div class="container" id="app">
    <main class="py-4">

        <div class="row">
            @hasSection('sidebar')
                <div class="col-2">@yield('sidebar')</div>
            @endif
            <div class="col">
                <div>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>Errors</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                @yield('content')

            </div>
        </div>

    </main>
</div>
</body>
</html>
