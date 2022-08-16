<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Restaurant</title>
    </head>
    <body class="antialiased">
    <h2>@yield('title')</h2>
        <ul>
            <li><a href="{{ route('restaurant.create') }}">{{ trans('globals.create_restaurant') }}</a></li>
            <li><a href="{{ route('reservation.create') }}">{{ trans('globals.table_reservation') }}</a></li>
        </ul>
        <br>
        @yield('content')
    </body>

    <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
</html>
