<header class="knd-header" x-data="{ mobileMenuOpen: false, cartCount: 0 }" x-init="
    // Cargar contador del carrito al inicializar
    fetch('/cart/info')
        .then(response => response.json())
        .then(data => {
            cartCount = data.cart_count;
        })
        .catch(error => console.error('Error loading cart info:', error));
">
    <div id="header-particles" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; pointer-events: none;"></div>
    <style>
        .knd-header {
            background: linear-gradient(135deg, rgba(44, 44, 44, 0.95), rgba(0, 0, 0, 0.98));
            backdrop-filter: blur(15px);
            border-bottom: 2px solid rgba(0, 191, 255, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 30px rgba(0, 191, 255, 0.2), 0 0 50px rgba(138, 43, 226, 0.1);
            position: relative;
            overflow: hidden;
        }

        .knd-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, 
                rgba(0, 191, 255, 0.05) 0%, 
                rgba(138, 43, 226, 0.05) 50%, 
                rgba(0, 191, 255, 0.05) 100%);
            z-index: 0;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100px;
            position: relative;
            z-index: 2;
        }

        .logo-section {
            display: flex;
            align-items: center;
        }

        .logo {
            height: 100px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            color: var(--knd-white);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-link:hover {
            color: var(--knd-neon-blue);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple));
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-login {
            color: var(--knd-white);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .btn-login:hover {
            color: var(--knd-neon-blue);
        }

        .btn-register {
            background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple));
            color: var(--knd-white);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 191, 255, 0.3);
            color: var(--knd-white);
        }

        .cart-button {
            position: relative;
            background: transparent;
            border: none;
            color: var(--knd-white);
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .cart-button:hover {
            color: var(--knd-neon-blue);
            background: rgba(0, 191, 255, 0.1);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--knd-electric-purple);
            color: var(--knd-white);
            font-size: 0.7rem;
            font-weight: bold;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(138, 43, 226, 0.7); }
            70% { box-shadow: 0 0 0 6px rgba(138, 43, 226, 0); }
            100% { box-shadow: 0 0 0 0 rgba(138, 43, 226, 0); }
        }

        .mobile-menu-button {
            display: none;
            background: transparent;
            border: none;
            color: var(--knd-white);
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
        }

        .mobile-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: rgba(44, 44, 44, 0.98);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(138, 43, 226, 0.2);
            padding: 1rem;
        }

        .mobile-menu.open {
            display: block;
        }

        .mobile-nav {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .mobile-nav .nav-link {
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .mobile-auth {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .auth-buttons {
                display: none;
            }

            .mobile-menu-button {
                display: block;
            }

            .header-container {
                padding: 0 0.5rem;
            }
        }

        @media (min-width: 769px) {
            .mobile-menu {
                display: none !important;
            }
        }
    </style>

    <div class="header-container">
        <!-- Logo -->
        <div class="logo-section">
            <a href="{{ route('store') }}">
                <img src="{{ asset('assets/images/knd-logo.png') }}" alt="KND Store" class="logo">
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="nav-menu">
            <a href="{{ route('store') }}" class="nav-link">Tienda</a>
            <a href="{{ route('products') }}" class="nav-link">Productos</a>
            @auth
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
            @endauth
        </nav>

        <!-- Desktop Auth & Cart -->
        <div class="auth-buttons">
            @auth
                <!-- User Menu -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="btn-login flex items-center gap-2">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="open" @click.away="open = false" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg py-1 z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn-register">Registrarse</a>
            @endauth

            <!-- Cart Button -->
            <a href="{{ route('cart') }}" class="cart-button">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count" x-show="cartCount > 0" x-text="cartCount">0</span>
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="mobile-menu-button">
            <i class="fas fa-bars" x-show="!mobileMenuOpen"></i>
            <i class="fas fa-times" x-show="mobileMenuOpen"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" :class="{ 'open': mobileMenuOpen }">
        <nav class="mobile-nav">
            <a href="{{ route('store') }}" class="nav-link">Tienda</a>
            <a href="{{ route('products') }}" class="nav-link">Productos</a>
            @auth
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
            @endauth
        </nav>

        <div class="mobile-auth">
            @auth
                <a href="{{ route('profile.edit') }}" class="btn-login">Perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-login w-full text-left">Cerrar Sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn-register">Registrarse</a>
            @endauth

            <a href="{{ route('cart') }}" class="cart-button">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count" x-show="cartCount > 0" x-text="cartCount">0</span>
                Carrito
            </a>
        </div>
    </div>

    <script>
        // Función global para actualizar contador del carrito
        window.updateCartCount = function(count) {
            const header = document.querySelector('.knd-header');
            if (header && header.__x) {
                header.__x.$data.cartCount = count;
            }
        };

        // Partículas específicas para el header
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof particlesJS !== 'undefined') {
                particlesJS('header-particles', {
                    particles: {
                        number: { 
                            value: 30, 
                            density: { 
                                enable: true, 
                                value_area: 400 
                            } 
                        },
                        color: { 
                            value: ["#00bfff", "#8a2be2"] 
                        },
                        shape: { 
                            type: "circle" 
                        },
                        opacity: { 
                            value: 0.3, 
                            random: true,
                            anim: {
                                enable: true,
                                speed: 1,
                                opacity_min: 0.1,
                                sync: false
                            }
                        },
                        size: { 
                            value: 2, 
                            random: true 
                        },
                        line_linked: {
                            enable: true,
                            distance: 80,
                            color: "#00bfff",
                            opacity: 0.2,
                            width: 1
                        },
                        move: {
                            enable: true,
                            speed: 1.5,
                            direction: "none",
                            random: true,
                            straight: false,
                            out_mode: "out",
                            bounce: false,
                            attract: {
                                enable: true,
                                rotateX: 600,
                                rotateY: 1200
                            }
                        }
                    },
                    interactivity: { 
                        detect_on: "canvas", 
                        events: { 
                            onhover: {
                                enable: true,
                                mode: "repulse"
                            },
                            onclick: {
                                enable: true,
                                mode: "push"
                            },
                            resize: true 
                        },
                        modes: {
                            repulse: {
                                distance: 100,
                                duration: 0.4
                            },
                            push: {
                                particles_nb: 4
                            }
                        }
                    },
                    retina_detect: true
                });
            }
        });
    </script>
</header> 