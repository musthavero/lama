<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Lama - The Open Laravel Marketplace</title>

       {{-- Laravel Mix - CSS File --}}
{{--        <link rel="stylesheet" href="{{ mix('css/frontend.css') }}">--}}

    </head>
    <body>
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/frontend.js') }}"></script> --}}
    </body>
</html>
