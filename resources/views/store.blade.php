<x-app-layout>
    <style>
        /* Solo overflow visible, sin position ni z-index globales */
        .hero-slide, .container, section, main, body {
            overflow: visible !important;
        }

        .hero-slide > .position-absolute {
            z-index: 1 !important;
            position: absolute !important;
            pointer-events: none !important;
        }

        .hero {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 4rem 0;
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/wallpaper.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: scroll;
        }

        .hero .heading {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: var(--knd-neon-blue);
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            color: var(--knd-white);
            opacity: 0.9;
        }

        .btn-gradient {
            display: inline-block;
            padding: 1rem 2rem;
            background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple));
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-family: 'Orbitron', sans-serif;
            text-transform: uppercase;
        }

        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,191,255,0.4);
            color: white;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--knd-neon-blue);
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
        }

        .glow-text {
            text-shadow: 0 0 10px rgba(0,191,255,0.5);
        }

        .platform-icon {
            font-size: 3rem;
            color: var(--knd-neon-blue);
            margin-bottom: 1rem;
        }

        .card {
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: var(--knd-gunmetal-gray);
            border-radius: 12px;
            transition: transform 0.3s ease;
            border: 1px solid rgba(138,43,226,0.2);
            text-decoration: none;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,191,255,0.3);
        }

        .card-title {
            color: var(--knd-white);
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--knd-neon-blue);
            margin-bottom: 1rem;
        }

        .feature-icon i {
            background: linear-gradient(45deg, var(--knd-neon-blue), var(--knd-electric-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-price {
            color: var(--knd-electric-purple);
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .text-decoration-line-through {
            text-decoration: line-through;
        }

        .small {
            font-size: 0.875rem;
        }

        .text-muted {
            color: #6c757d;
        }

        /* Footer Styles */
        .knd-footer {
            position: relative;
            overflow: hidden;
        }

        .knd-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, 
                rgba(0, 191, 255, 0.03) 0%, 
                rgba(138, 43, 226, 0.03) 50%, 
                rgba(0, 191, 255, 0.03) 100%);
            z-index: 0;
        }

        .footer-section {
            position: relative;
            z-index: 1;
        }

        .footer-section h4,
        .footer-section h5 {
            color: var(--knd-neon-blue);
            font-family: 'Orbitron', sans-serif;
            margin-bottom: 1rem;
        }

        .footer-section ul li a:hover {
            color: var(--knd-neon-blue) !important;
            transform: translateX(5px);
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: var(--knd-electric-purple) !important;
            transform: scale(1.2);
            transition: all 0.3s ease;
        }

        .contact-info p {
            transition: all 0.3s ease;
        }

        .contact-info p:hover {
            color: var(--knd-white) !important;
            transform: translateX(5px);
        }

        /* Animaciones mejoradas para las transiciones */
        @keyframes transitionGlow {
            0% { 
                opacity: 0.2;
                transform: scale(1);
            }
            50% {
                opacity: 0.4;
                transform: scale(1.05);
            }
            100% { 
                opacity: 0.3;
                transform: scale(1);
            }
        }

        @keyframes energyFlow {
            0% { 
                transform: translateY(-50%) translateX(-100%);
                opacity: 0;
            }
            25% {
                opacity: 0.5;
            }
            50% { 
                opacity: 0.8;
            }
            75% {
                opacity: 0.5;
            }
            100% { 
                transform: translateY(-50%) translateX(100%);
                opacity: 0;
            }
        }

        /* Efecto de profundidad suave para la transición */
        .transition-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(45deg, transparent 30%, rgba(0,191,255,0.03) 50%, transparent 70%),
                linear-gradient(-45deg, transparent 30%, rgba(138,43,226,0.03) 50%, transparent 70%);
            animation: depthShift 8s ease-in-out infinite;
        }

        @keyframes depthShift {
            0%, 100% { 
                transform: translateX(0) translateY(0);
                opacity: 0.3;
            }
            50% { 
                transform: translateX(15px) translateY(-5px);
                opacity: 0.6;
            }
        }

        @keyframes pulseLine {
            0%, 100% { 
                opacity: 0.2;
                transform: translate(-50%, -50%) scaleX(1);
            }
            50% { 
                opacity: 0.6;
                transform: translate(-50%, -50%) scaleX(1.1);
            }
        }

        /* Animación suave para las tarjetas de categorías */
        .category-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 28px rgba(0,191,255,0.2);
        }

        .category-card .card {
            transition: all 0.3s ease;
        }

        .category-card:hover .card {
            border-color: rgba(0,191,255,0.4);
            box-shadow: 0 8px 20px rgba(0,191,255,0.15);
        }
    </style>

    <!-- Hero Section -->
    <section class="hero">
        <div style="position: relative; z-index: 2;">
            <h1 class="heading">Ride the Game. Rule the Street.</h1>
            <p>Equipamiento gamer y biker para dominar mundos y caminos.</p>
            <a class="btn-gradient" href="#featured">Explorar</a>
        </div>
    </section>

    <!-- Sección de transición suave -->
    <section class="transition-section" style="
        position: relative;
        height: 80px;
        background: linear-gradient(180deg, 
            transparent 0%, 
            rgba(0,0,0,0.2) 40%, 
            rgba(0,0,0,0.5) 70%, 
            rgba(0,0,0,0.9) 100%);
        margin-top: -40px;
        z-index: 1;
        overflow: hidden;
    ">
        <!-- Elementos decorativos de transición -->
        <div style="
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(0,191,255,0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 30%, rgba(138,43,226,0.08) 0%, transparent 50%);
            animation: transitionGlow 4s ease-in-out infinite alternate;
        "></div>
        
        <!-- Líneas de energía -->
        <div style="
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(0,191,255,0.2) 20%, 
                rgba(138,43,226,0.2) 50%, 
                rgba(0,191,255,0.2) 80%, 
                transparent 100%);
            transform: translateY(-50%);
            animation: energyFlow 3s linear infinite;
        "></div>
    </section>

    <!-- Categorías -->
    <section class="py-6 position-relative" style="z-index: 2; background: rgba(0,0,0,0.9); margin-top: -20px; padding-top: 3rem;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            <h2 class="section-title glow-text">NUESTRAS CATEGORÍAS</h2>
            <div class="row g-4 justify-content-center" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;">
                <!-- Consolas -->
                <div class="col-lg-2 col-md-4 col-6" style="flex: 0 0 200px;">
                    <a href="{{ route('products', ['categoria' => 'consolas']) }}" class="category-card" style="text-decoration: none;">
                        <div class="card h-100 text-center py-4" style="background: #f8f9fa; border: 1px solid rgba(0,191,255,0.2); box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <div class="card-body">
                                <div class="platform-icon"><i class="fas fa-gamepad"></i></div>
                                <h5 class="card-title" style="color: #333;">CONSOLAS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Gift Cards -->
                <div class="col-lg-2 col-md-4 col-6" style="flex: 0 0 200px;">
                    <a href="{{ route('products', ['categoria' => 'giftcards']) }}" class="category-card" style="text-decoration: none;">
                        <div class="card h-100 text-center py-4" style="background: #f8f9fa; border: 1px solid rgba(0,191,255,0.2); box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <div class="card-body">
                                <div class="platform-icon"><i class="fas fa-gift"></i></div>
                                <h5 class="card-title" style="color: #333;">GIFT CARDS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Accesorios Gamer -->
                <div class="col-lg-2 col-md-4 col-6" style="flex: 0 0 200px;">
                    <a href="{{ route('products', ['categoria' => 'accesorios-gamer']) }}" class="category-card" style="text-decoration: none;">
                        <div class="card h-100 text-center py-4" style="background: #f8f9fa; border: 1px solid rgba(0,191,255,0.2); box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <div class="card-body">
                                <div class="platform-icon"><i class="fas fa-headset"></i></div>
                                <h5 class="card-title" style="color: #333;">ACCESORIOS GAMER</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Accesorios Bikers -->
                <div class="col-lg-2 col-md-4 col-6" style="flex: 0 0 200px;">
                    <a href="{{ route('products', ['categoria' => 'accesorios-bikers']) }}" class="category-card" style="text-decoration: none;">
                        <div class="card h-100 text-center py-4" style="background: #f8f9fa; border: 1px solid rgba(0,191,255,0.2); box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <div class="card-body">
                                <div class="platform-icon"><i class="fas fa-motorcycle"></i></div>
                                <h5 class="card-title" style="color: #333;">ACCESORIOS BIKERS</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Transición suave entre categorías y productos -->
    <section class="transition-section" style="
        position: relative;
        height: 60px;
        background: linear-gradient(180deg, 
            rgba(0,0,0,0.9) 0%, 
            rgba(0,0,0,0.8) 50%, 
            rgba(0,0,0,0.9) 100%);
        margin-top: 0;
        z-index: 1;
        overflow: hidden;
    ">
        <!-- Líneas de conexión mejoradas -->
        <div style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150px;
            height: 1px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(0,191,255,0.3) 30%, 
                rgba(138,43,226,0.3) 70%, 
                transparent 100%);
            animation: pulseLine 2s ease-in-out infinite;
        "></div>
        
        <!-- Elementos decorativos adicionales -->
        <div style="
            position: absolute;
            top: 20%;
            left: 20%;
            width: 4px;
            height: 4px;
            background: rgba(0,191,255,0.4);
            border-radius: 50%;
            animation: pulseLine 1.5s ease-in-out infinite;
        "></div>
        <div style="
            position: absolute;
            top: 70%;
            right: 25%;
            width: 3px;
            height: 3px;
            background: rgba(138,43,226,0.4);
            border-radius: 50%;
            animation: pulseLine 2.5s ease-in-out infinite;
        "></div>
    </section>

    <!-- Productos Destacados -->
    <section id="featured" class="py-5" style="background: rgba(0,0,0,0.9); margin-top: 0; padding-top: 3rem;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            <div class="d-flex justify-content-between align-items-center mb-5" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
                <h2 class="heading mb-0" style="font-size: 2.5rem; color: var(--knd-neon-blue); margin-bottom: 0; font-family: 'Orbitron', sans-serif; font-weight: 700;">Productos Destacados</h2>
                <a href="{{ route('products') }}" class="btn-gradient" style="display: inline-block; padding: 0.8rem 1.5rem; background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple)); color: white; text-decoration: none; border-radius: 8px; font-weight: 600;">Ver Todos</a>
            </div>
            <div class="row g-4" style="display: flex; gap: 1.5rem; justify-content: center;">
                <!-- Steam Wallet $50 -->
                <div class="col-lg-3 col-md-6" style="flex: 1; min-width: 250px; max-width: 280px;">
                    <div class="card h-100 d-flex flex-column align-items-center text-center p-3" style="height: 350px; display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1rem; background: #f8f9fa; border-radius: 12px; border: 1px solid rgba(0,191,255,0.2);">
                        <img src="{{ asset('assets/images/Steam_logo.svg') }}" class="mb-3" alt="Steam Card" style="width: 100px; height: 100px; object-fit: contain; margin-bottom: 1rem;">
                        <h5 class="card-title mb-1" style="color: #333; font-size: 1.1rem; margin-bottom: 0.5rem; font-family: 'Orbitron', sans-serif; font-weight: 600;">Steam Wallet $50</h5>
                        <div class="card-price mb-2" style="color: var(--knd-electric-purple); font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">$42.50 <span class="text-decoration-line-through small text-muted">$50.00</span></div>
                        <p class="mb-3" style="color: #666; margin-bottom: 1rem;">Recarga instantánea para tu cuenta Steam</p>
                        <button class="btn-gradient btn-sm add-to-cart mt-auto" style="margin-top: auto; padding: 0.5rem 1rem; background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple)); color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;" data-id="1" data-name="Steam Wallet $50" data-price="42.50">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>
                </div>
                
                <!-- PS Plus 12 Meses -->
                <div class="col-lg-3 col-md-6" style="flex: 1; min-width: 250px; max-width: 280px;">
                    <div class="card h-100 d-flex flex-column align-items-center text-center p-3" style="height: 350px; display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1rem; background: #f8f9fa; border-radius: 12px; border: 1px solid rgba(0,191,255,0.2);">
                        <img src="{{ asset('assets/images/Playstation_Plus.svg') }}" class="mb-3" alt="PS Plus" style="width: 100px; height: 100px; object-fit: contain; margin-bottom: 1rem;">
                        <h5 class="card-title mb-1" style="color: #333; font-size: 1.1rem; margin-bottom: 0.5rem; font-family: 'Orbitron', sans-serif; font-weight: 600;">PS Plus 12 Meses</h5>
                        <div class="card-price mb-2" style="color: var(--knd-electric-purple); font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">$59.99</div>
                        <p class="mb-3" style="color: #666; margin-bottom: 1rem;">Suscripción anual PlayStation Plus</p>
                        <button class="btn-gradient btn-sm add-to-cart mt-auto" style="margin-top: auto; padding: 0.5rem 1rem; background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple)); color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;" data-id="2" data-name="PS Plus 12 Meses" data-price="59.99">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>
                </div>
                
                <!-- Xbox Game Pass Ultimate -->
                <div class="col-lg-3 col-md-6" style="flex: 1; min-width: 250px; max-width: 280px;">
                    <div class="card h-100 d-flex flex-column align-items-center text-center p-3" style="height: 350px; display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1rem; background: #f8f9fa; border-radius: 12px; border: 1px solid rgba(0,191,255,0.2);">
                        <img src="{{ asset('assets/images/xbox_gamepass.svg') }}" class="mb-3" alt="Xbox Game Pass" style="width: 100px; height: 100px; object-fit: contain; margin-bottom: 1rem;">
                        <h5 class="card-title mb-1" style="color: #333; font-size: 1.1rem; margin-bottom: 0.5rem; font-family: 'Orbitron', sans-serif; font-weight: 600;">Xbox Game Pass Ultimate</h5>
                        <div class="card-price mb-2" style="color: var(--knd-electric-purple); font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">$29.99</div>
                        <p class="mb-3" style="color: #666; margin-bottom: 1rem;">3 meses de acceso a cientos de juegos</p>
                        <button class="btn-gradient btn-sm add-to-cart mt-auto" style="margin-top: auto; padding: 0.5rem 1rem; background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple)); color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;" data-id="3" data-name="Xbox Game Pass Ultimate" data-price="29.99">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>
                </div>
                
                <!-- Nintendo eShop $20 -->
                <div class="col-lg-3 col-md-6" style="flex: 1; min-width: 250px; max-width: 280px;">
                    <div class="card h-100 d-flex flex-column align-items-center text-center p-3" style="height: 350px; display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1rem; background: #f8f9fa; border-radius: 12px; border: 1px solid rgba(0,191,255,0.2);">
                        <img src="{{ asset('assets/images/nintendo_eshop.svg') }}" class="mb-3" alt="Nintendo eShop" style="width: 100px; height: 100px; object-fit: contain; margin-bottom: 1rem;">
                        <h5 class="card-title mb-1" style="color: #333; font-size: 1.1rem; margin-bottom: 0.5rem; font-family: 'Orbitron', sans-serif; font-weight: 600;">Nintendo eShop $20</h5>
                        <div class="card-price mb-2" style="color: var(--knd-electric-purple); font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">$18.50</div>
                        <p class="mb-3" style="color: #666; margin-bottom: 1rem;">Tarjeta prepago para Nintendo eShop</p>
                        <button class="btn-gradient btn-sm add-to-cart mt-auto" style="margin-top: auto; padding: 0.5rem 1rem; background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple)); color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;" data-id="4" data-name="Nintendo eShop $20" data-price="18.50">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Características premium -->
    <section class="py-6 position-relative" style="background: rgba(0,0,0,0.9);">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            <h2 class="section-title glow-text text-center">POR QUÉ ELEGIRNOS</h2>
            <div class="row g-5 mt-4" style="display: flex; gap: 2rem; margin-top: 2rem; justify-content: center;">
                <div class="col-md-4 text-center" style="flex: 1; min-width: 300px; max-width: 350px;">
                    <div class="feature-icon mx-auto">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4 class="mb-3" style="color: var(--knd-neon-blue); font-family: 'Orbitron', sans-serif; margin-bottom: 1rem;">ENTREGA INSTANTÁNEA</h4>
                    <p style="opacity: 0.8; color: var(--knd-white);">Recibe tus productos digitales en menos de 5 minutos después del pago confirmado.</p>
                </div>
                <div class="col-md-4 text-center" style="flex: 1; min-width: 300px; max-width: 350px;">
                    <div class="feature-icon mx-auto">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="mb-3" style="color: var(--knd-neon-blue); font-family: 'Orbitron', sans-serif; margin-bottom: 1rem;">SEGURIDAD GARANTIZADA</h4>
                    <p style="opacity: 0.8; color: var(--knd-white);">Transacciones protegidas con cifrado SSL y las mejores pasarelas de pago.</p>
                </div>
                <div class="col-md-4 text-center" style="flex: 1; min-width: 300px; max-width: 350px;">
                    <div class="feature-icon mx-auto">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="mb-3" style="color: var(--knd-neon-blue); font-family: 'Orbitron', sans-serif; margin-bottom: 1rem;">SOPORTE 24/7</h4>
                    <p style="opacity: 0.8; color: var(--knd-white);">Nuestro equipo de soporte está disponible en todo momento para ayudarte.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Efectos hover mejorados para las cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    // Solo aplicar efectos si no es una tarjeta de categoría (ya tienen sus propios efectos CSS)
                    if (!this.closest('.category-card')) {
                        this.style.transform = 'translateY(-8px)';
                        this.style.boxShadow = '0 12px 28px rgba(0,191,255,0.25)';
                        this.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                    }
                });
                
                card.addEventListener('mouseleave', function() {
                    // Solo aplicar efectos si no es una tarjeta de categoría
                    if (!this.closest('.category-card')) {
                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
                        this.style.transition = 'all 0.3s ease';
                    }
                });
            });
            
            // Funcionalidad del carrito real
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    const productName = this.getAttribute('data-name');
                    const productPrice = this.getAttribute('data-price');
                    
                    // Mostrar loading
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Añadiendo...';
                    this.disabled = true;
                    
                    fetch('/cart/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            product_name: productName,
                            price: productPrice,
                            quantity: 1
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Actualizar contador del carrito en el header
                            if (window.updateCartCount) {
                                window.updateCartCount(data.cart_count);
                            }
                            
                            // Mostrar mensaje de éxito
                            this.innerHTML = '<i class="fas fa-check"></i> ¡Añadido!';
                            this.style.background = 'linear-gradient(90deg, #10b981, #059669)';
                            
                            setTimeout(() => {
                                this.innerHTML = originalText;
                                this.style.background = 'linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple))';
                                this.disabled = false;
                            }, 2000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        this.innerHTML = originalText;
                        this.disabled = false;
                        alert('Error al añadir al carrito');
                    });
                });
            });
        });
    </script>

    <!-- Footer -->
    <footer class="knd-footer" style="background: linear-gradient(135deg, rgba(44, 44, 44, 0.95), rgba(0, 0, 0, 0.98)); border-top: 2px solid rgba(0, 191, 255, 0.3); padding: 3rem 0 1rem; margin-top: 4rem;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            <div class="row" style="display: flex; flex-wrap: wrap; gap: 2rem;">
                <!-- Información de la empresa -->
                <div class="col-md-4" style="flex: 1; min-width: 250px;">
                    <div class="footer-section">
                        <div style="text-align: center; margin-bottom: 1rem;">
                            <img src="{{ asset('assets/images/knd-logo.png') }}" alt="KND Store" style="height: 120px; display: block; margin: 0 auto;">
                        </div>
                        <p style="color: #ccc; line-height: 1.6; margin-bottom: 1rem;">
                            Tu destino para equipamiento gamer y biker de alta calidad. 
                            Dominamos tanto los mundos virtuales como las calles reales.
                        </p>
                        <div class="social-links" style="display: flex; gap: 1rem;">
                            <a href="#" style="color: var(--knd-neon-blue); font-size: 1.5rem; transition: color 0.3s;">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" style="color: var(--knd-neon-blue); font-size: 1.5rem; transition: color 0.3s;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" style="color: var(--knd-neon-blue); font-size: 1.5rem; transition: color 0.3s;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" style="color: var(--knd-neon-blue); font-size: 1.5rem; transition: color 0.3s;">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Enlaces rápidos -->
                <div class="col-md-2" style="flex: 1; min-width: 200px;">
                    <div class="footer-section">
                        <h5 style="color: var(--knd-neon-blue); font-family: 'Orbitron', sans-serif; margin-bottom: 1rem;">Enlaces Rápidos</h5>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 0.5rem;">
                                <a href="{{ route('store') }}" style="color: #ccc; text-decoration: none; transition: color 0.3s;">Inicio</a>
                            </li>
                            <li style="margin-bottom: 0.5rem;">
                                <a href="{{ route('products') }}" style="color: #ccc; text-decoration: none; transition: color 0.3s;">Productos</a>
                            </li>
                            <li style="margin-bottom: 0.5rem;">
                                <a href="{{ route('cart') }}" style="color: #ccc; text-decoration: none; transition: color 0.3s;">Carrito</a>
                            </li>
                            <li style="margin-bottom: 0.5rem;">
                                <a href="#" style="color: #ccc; text-decoration: none; transition: color 0.3s;">Ofertas</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Categorías -->
                <div class="col-md-2" style="flex: 1; min-width: 200px;">
                    <div class="footer-section">
                        <h5 style="color: var(--knd-neon-blue); font-family: 'Orbitron', sans-serif; margin-bottom: 1rem;">Categorías</h5>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 0.5rem;">
                                <a href="{{ route('products', ['categoria' => 'consolas']) }}" style="color: #ccc; text-decoration: none; transition: color 0.3s;">Consolas</a>
                            </li>
                            <li style="margin-bottom: 0.5rem;">
                                <a href="{{ route('products', ['categoria' => 'giftcards']) }}" style="color: #ccc; text-decoration: none; transition: color 0.3s;">Gift Cards</a>
                            </li>
                            <li style="margin-bottom: 0.5rem;">
                                <a href="{{ route('products', ['categoria' => 'accesorios-gamer']) }}" style="color: #ccc; text-decoration: none; transition: color 0.3s;">Accesorios Gamer</a>
                            </li>
                            <li style="margin-bottom: 0.5rem;">
                                <a href="{{ route('products', ['categoria' => 'accesorios-bikers']) }}" style="color: #ccc; text-decoration: none; transition: color 0.3s;">Accesorios Bikers</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Contacto -->
                <div class="col-md-4" style="flex: 1; min-width: 250px;">
                    <div class="footer-section">
                        <h5 style="color: var(--knd-neon-blue); font-family: 'Orbitron', sans-serif; margin-bottom: 1rem;">Contacto</h5>
                        <div class="contact-info" style="color: #ccc;">
                            <p style="margin-bottom: 0.5rem;">
                                <i class="fas fa-envelope" style="color: var(--knd-neon-blue); margin-right: 0.5rem;"></i>
                                info@kndstore.com
                            </p>
                            <p style="margin-bottom: 0.5rem;">
                                <i class="fas fa-phone" style="color: var(--knd-neon-blue); margin-right: 0.5rem;"></i>
                                +1 (555) 123-4567
                            </p>
                            <p style="margin-bottom: 0.5rem;">
                                <i class="fas fa-map-marker-alt" style="color: var(--knd-neon-blue); margin-right: 0.5rem;"></i>
                                Calle Principal #123, Ciudad
                            </p>
                            <p style="margin-bottom: 1rem;">
                                <i class="fas fa-clock" style="color: var(--knd-neon-blue); margin-right: 0.5rem;"></i>
                                Lun-Vie: 9AM-6PM
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Línea divisoria -->
            <hr style="border: none; height: 1px; background: linear-gradient(90deg, transparent, var(--knd-neon-blue), transparent); margin: 2rem 0 1rem;">

            <!-- Copyright -->
            <div class="footer-bottom" style="text-align: center; color: #666;">
                <p style="margin-bottom: 0.5rem;">
                    © 2024 KND Store. Todos los derechos reservados.
                </p>
                <p style="font-size: 0.9rem; color: #888;">
                    Diseñado con <i class="fas fa-heart" style="color: #ff6b6b;"></i> para gamers y bikers
                </p>
            </div>
        </div>
    </footer>
</x-app-layout> 