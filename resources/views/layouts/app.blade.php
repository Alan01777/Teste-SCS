<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste SCS Task-List</title>
    @yield('styles')
</head>
<body>
    <h1>@yield('title')</h1>

    @if (session()->has('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <div>
        @yield('content')
    </div>
</body>
</html>
