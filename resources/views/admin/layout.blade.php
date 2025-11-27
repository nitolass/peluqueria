<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Juan Studio Hair') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans antialiased">

<!-- HEADER -->
<header class="bg-gradient-to-r from-blue-500 to-indigo-600 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <a href="{{ route('dashboard') }}"
               class="text-white text-2xl font-bold hover:opacity-90 transition">Juan Studio Hair</a>

            <!-- Menú usuario -->
            <div class="ml-4 relative">
                <button id="user-menu-button"
                        class="flex items-center text-white hover:text-gray-200 focus:outline-none">
                    <span class="mr-2">{{ auth()->user()->name }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-1 z-50">
                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- CONTENIDO PRINCIPAL -->
<main class="max-w-7xl mx-auto p-6">

    <!-- Contenedor de contenido -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Sidebar info opcional -->
        <div class="hidden md:block md:col-span-1 bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-4">Bienvenido {{ auth()->user()->name }}</h3>
            <p class="text-gray-600">Aquí puedes ver tus reservas y gestionar tus citas de forma sencilla.</p>
        </div>

        <!-- Área principal -->
        <div class="md:col-span-2">
            @yield('content')
        </div>

    </div>

</main>

<!-- Scripts -->
<script>
    // Dropdown
    const button = document.getElementById('user-menu-button');
    const dropdown = document.getElementById('user-dropdown');
    button.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });
    window.addEventListener('click', e => {
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>

</body>
</html>
