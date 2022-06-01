<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo</title>



    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="/storage/images/favicon-32x32.png" type="image/x-icon">
    <link rel="icon" href="/storage/images/favicon-32x32.png" type="image/x-icon">    
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    @yield('link')
    
</head>
<body>
    
    <div id="app">

        @include('components.header')

        @yield('content')

        @include('components.footer')
        
    </div>

</body>
</html>