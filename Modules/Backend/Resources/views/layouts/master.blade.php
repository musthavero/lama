<!DOCTYPE html>
<html lang="en">
<head>
    @livewireStyles
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Administration - Lama - The Open Laravel Marketplace</title>
    {{-- Laravel Mix - CSS File --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/backend.css') }}"> --}}

</head>
<body>
<div>
    <div class="flex-1 md:flex md:items-center md:justify-between">
        <div class="relative">
            @each('menus::components.toplevel-menu-item',$_SESSION['menus'],'item')
        </div>
    </div>
    @yield('content')

    {{-- Laravel Mix - JS File --}}
    {{-- <script src="{{ mix('js/backend.js') }}"></script> --}}
    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer></script>
</div>
</body>
</html>
