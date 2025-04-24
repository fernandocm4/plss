<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">
    <div class="flex flex-row h-full w-full">
        <div class="bg-red-500 rounded-r-lg shadow-xl/30 flex flex-col md:w-1/2 lg:w-1/4 2xl:w-1/6">
            <div class="flex flex-col py-8 items-center">
                <a href="{{ route('home') }}"><img class="w-25 pointer-events-none" src="/images/logo.png" alt="logo da empresa PLSS Soluções"></a>
            </div>
            <ul>
                <li class="hover:bg-red-800 hover:cursor-pointer h-1/2  {{ request()->routeIs('home') ? 'bg-red-900':'' }} "><a class="ml-4 text-white h-full w-full flex items-center" href="{{ route('home') }}">Início</a></li>
                <li class="hover:bg-red-800 hover:cursor-pointer h-1/2  {{ request()->routeIs('chamados*') ? 'bg-red-900':'' }}"><a class="ml-4 text-white h-full w-full flex items-center" href="{{ route('chamados') }}">Chamados e ajuda</a></li>
                <li class="hover:bg-red-800 hover:cursor-pointer h-1/2  {{ request()->routeIs('novo-chamado') ? 'bg-red-900':'' }}"><a class="ml-4 text-white h-full w-full flex items-center" href="{{ route('novo-chamado') }}">Abrir um novo chamado</a></li>
            </ul>
        </div>
        <main class="w-full">
            @yield('content')
        </main>
    </div>
</body>
</html>