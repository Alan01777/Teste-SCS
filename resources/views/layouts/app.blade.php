<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg bg-slate-200">
    <h1 class="text-4xl mb-6 text-center">@yield('title')</h1>

    @if (session()->has('status'))
        <div class=" px-3 py-3 mt-3 mb-3 text-green-800 bg-green-300 rounded-full text-center">
            {{ session('status') }}
        </div>
    @endif

    <div>
        @yield('content')
    </div>
</body>
</html>
