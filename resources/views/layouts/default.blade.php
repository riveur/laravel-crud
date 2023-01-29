<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        Laravel CRUD - @yield('title', 'App')
    </title>
    @vite('resources/js/app.js')
</head>

<body>
    @section('header')
        @auth
            @include('elements.header')
        @endauth
    @show
    <main>
        <div class="container">
            @yield('body')
        </div>
    </main>
</body>

</html>
