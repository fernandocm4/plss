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
        <div class="bg-red-500 flex flex-col w-1/6">
            <h1 class="text-center">LOGO</h1>
            <ul>
                <li class="hover:bg-red-800 hover:cursor-pointer"><a class="text-white" href="/">Início</a></li>
                <li class="hover:bg-red-800 hover:cursor-pointer"><a class="text-white" href="/chamados">Chamados e ajuda</a></li>
                <li class="hover:bg-red-800 hover:cursor-pointer"><a class="text-white" href="/novo-chamado">Abrir um novo chamado</a></li>
            </ul>
        </div>
        <main class="w-full">
            @yield('content')
        </main>
    </div>
</body>
</html>