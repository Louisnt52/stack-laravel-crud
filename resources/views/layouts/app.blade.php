<!DOCTYPE html>
<html>
<head>
    <title>Mi Sistema</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto">
        @yield('content')
    </div>
</body>
</html>