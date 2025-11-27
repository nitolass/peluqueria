<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juan Studio Hair</title>
    @vite('resources/css/app.css') <!-- o el link a tu CSS -->
</head>
<body class="bg-white font-sans">
<!-- Aquí puede ir un navbar si quieres -->

<main>
    @yield('content') <!-- ¡IMPORTANTE! -->
</main>

<!-- Scripts -->
@vite('resources/js/app.js') <!-- si usas Vite para JS -->
</body>
</html>
