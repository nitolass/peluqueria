@extends('layout')

@section('content')
    <div class="min-h-screen flex">

        <!-- LEFT SIDE: INFO -->
        <div class="w-1/2 p-16 flex flex-col justify-center
                bg-gradient-to-br from-blue-500 via-blue-600 to-blue-900
                animate-gradient-bg text-white transition-all duration-500">

            <!-- TITULO ANIMADO -->
            <h1 class="text-5xl font-bold mb-6 transition-transform duration-300 hover:scale-110 cursor-default">
                Juan Studio Hair
            </h1>

            <p class="text-lg leading-relaxed mb-6 transition-transform duration-300 hover:scale-105">
                Bienvenido a Juan Studio Hair, tu espacio de confianza en Murcia para conseguir el estilo que mereces.
                Ofrecemos cortes modernos, coloración profesional, barbería y asesoramiento personalizado.
            </p>

            <!-- LISTA ANIMADA -->
            <ul class="space-y-2 text-lg">
                <li class="transform transition-transform duration-300 hover:scale-110 cursor-pointer">💈 Estilo moderno y clásico</li>
                <li class="transform transition-transform duration-300 hover:scale-110 cursor-pointer">💇‍♂️ Atención personalizada</li>
                <li class="transform transition-transform duration-300 hover:scale-110 cursor-pointer">🎨 Coloración profesional</li>
                <li class="transform transition-transform duration-300 hover:scale-110 cursor-pointer">📍 Ubicados en Murcia</li>
            </ul>
        </div>

        <!-- RIGHT SIDE: LOGIN FORM -->
        <div class="w-1/2 flex items-center justify-center p-12 bg-white">
            <div class="w-full max-w-md">

                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-right">
                    Iniciar sesión
                </h2>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Email</label>
                        <input type="email" name="email" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:outline-none">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Contraseña</label>
                        <input type="password" name="password" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:outline-none">
                    </div>

                    <!-- Submit -->
                    <div class="text-right">
                        <button type="submit"
                                class="px-6 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition">
                            Entrar
                        </button>
                    </div>
                </form>

                <p class="text-sm text-gray-600 mt-4 text-right">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="text-blue-700 hover:underline">Regístrate aquí</a>
                </p>

            </div>
        </div>

    </div>
@endsection
