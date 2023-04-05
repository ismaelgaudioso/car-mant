<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://kit.fontawesome.com/faea0390ec.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])





</head>

<body class="h-screen overflow-hidden items-center justify-center" style="background: #edf2f7;">

    @include('layouts.sidebar')

    <!-- Content -->
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">

        @if(!isset($header)) 
            {{ $header = "" }}
        @endif

        <!-- Top bar -->
       @include('layouts.topbar', ["header",$header])       
        <!-- Container -->
        <div class="px-6 pt-6 2xl:container">
            <!-- Panels -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                {{ $slot }}                 
            </div>
        </div>
    </div>

    @if (isset($scriptjs))
    {{ $scriptjs }}
    @endif

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
</body>

</html>