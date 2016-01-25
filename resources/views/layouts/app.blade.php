<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <title>Engine 74 Code Test</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('style.css') }}" />
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
    @include('layouts.partials.navbar')
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbEfiVVssW6-SAkPxIeLmeFt8roXyWehk&libraries=places&callback=initAutocomplete"
    async defer></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
