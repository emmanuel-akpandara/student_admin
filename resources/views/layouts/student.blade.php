<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <meta name="description" content={{$description}}>
    <title>{{$title}}</title>
</head>
<body class="font-sans antialiased">
<div class="flex flex-col space-y-4 min-h-screen text-gray-800 bg-gray-100">
    <header class="shadow bg-white/70 sticky inset-0 backdrop-blur-sm z-10">
        <x-navigation/>
    </header>
    <main class="container mx-auto p-4 flex-1 px-4">

        <h1 class="text-3xl mb-4">
            {{$title}}
        </h1>
        {{$slot}}

    </main>
<x-layout.footer></x-layout.footer>
</div>
@stack('script')
@livewireScripts
</body>
</html>
