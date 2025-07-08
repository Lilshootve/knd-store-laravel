<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/favicon-96x96.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/site.webmanifest') }}">
    </head>
    <body class="font-sans antialiased">
    <!-- Fondo de partículas global -->
    <div id="particles-bg" style="position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:0;pointer-events:none;transition:opacity 0.3s ease;"></div>
    
    <style>
        .particles-hidden {
            opacity: 0 !important;
        }
        
        /* CSS puro para ocultar partículas en hover */
        .card:hover ~ #particles-bg,
        .category-card:hover ~ #particles-bg,
        .btn-gradient:hover ~ #particles-bg,
        .add-to-cart:hover ~ #particles-bg,
        .platform-icon:hover ~ #particles-bg,
        .feature-icon:hover ~ #particles-bg,
        nav a:hover ~ #particles-bg,
        .nav-link:hover ~ #particles-bg,
        .dropdown-link:hover ~ #particles-bg {
            opacity: 0 !important;
            transition: opacity 0.3s ease !important;
        }
        
        /* También para elementos hijos */
        .card:hover #particles-bg,
        .category-card:hover #particles-bg,
        .btn-gradient:hover #particles-bg,
        .add-to-cart:hover #particles-bg,
        .platform-icon:hover #particles-bg,
        .feature-icon:hover #particles-bg,
        nav a:hover #particles-bg,
        .nav-link:hover #particles-bg,
        .dropdown-link:hover #particles-bg {
            opacity: 0 !important;
            transition: opacity 0.3s ease !important;
        }
    </style>
    
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- KND Header Component -->
        <x-knd-header />

            <!-- Page Heading -->
        @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
        @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        // Partículas de fondo global
        document.addEventListener('DOMContentLoaded', function() {
            particlesJS('particles-bg', {
                particles: {
                    number: { value: 80, density: { enable: true, value_area: 900 } },
                    color: { value: "#8a2be2" },
                    shape: { type: "circle" },
                    opacity: { value: 0.18, random: true },
                    size: { value: 3, random: true },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: "#6a0dad",
                        opacity: 0.10,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 1.2,
                        direction: "none",
                        random: true,
                        straight: false,
                        out_mode: "out",
                        bounce: false
                    }
                },
                interactivity: { detect_on: "canvas", events: { resize: true } },
                retina_detect: true
            });

            // Sistema simple de debug para verificar que las partículas funcionen
            console.log('Partículas inicializadas correctamente');
            
            // Verificar que las partículas estén visibles por defecto
            const particlesBg = document.getElementById('particles-bg');
            if (particlesBg) {
                console.log('Elemento de partículas encontrado');
                particlesBg.style.opacity = '1';
            }
        });
    </script>
    </body>
</html>
