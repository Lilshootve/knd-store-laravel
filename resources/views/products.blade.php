<x-app-layout>
    <style>
        .products-container {
            background: rgba(0,0,0,0.9);
            min-height: 100vh;
            padding: 2rem 1rem;
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        /* Sistema de partículas */
        #particles-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .products-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: none;
        }

        .filter-section {
            background: #f8f9fa; /* Blanco pastel */
            padding: 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            position: relative;
            z-index: 3;
            border: 1px solid rgba(0,191,255,0.2);
        }

        .filter-title {
            color: #333;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .filter-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            background: transparent;
            border: 2px solid var(--knd-electric-purple);
            color: var(--knd-electric-purple);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--knd-electric-purple);
            color: var(--knd-white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(138,43,226,0.3);
        }

        /* Layout centrado y organizado */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem 0;
            justify-content: center;
            width: 100%;
            margin: 0 auto;
        }

        .product-card {
            background: #f8f9fa; /* Blanco pastel */
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0,191,255,0.2);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 350px;
            position: relative;
            overflow: hidden;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,191,255,0.05) 0%, rgba(138,43,226,0.05) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .product-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 28px rgba(0,191,255,0.2);
        }

        .product-card:hover::before {
            opacity: 1;
        }

        .product-card > * {
            position: relative;
            z-index: 2;
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin: 0 auto 1rem;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-title {
            color: #333;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-family: 'Orbitron', sans-serif;
        }

        .product-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .product-price {
            color: var(--knd-electric-purple);
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            font-family: 'Orbitron', sans-serif;
        }

        .add-to-cart-btn {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple));
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            font-family: 'Orbitron', sans-serif;
        }

        .add-to-cart-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,191,255,0.4);
        }

        .no-products {
            text-align: center;
            color: var(--knd-white);
            font-size: 1.2rem;
            padding: 3rem;
        }

        /* Animaciones para partículas */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .floating-element {
            animation: float 3s ease-in-out infinite;
        }
    </style>

    <!-- Sistema de partículas -->
    <div id="particles-bg"></div>

    <div class="products-container">
        <div class="products-content">
            <div class="container-fluid">
                <!-- Filtros -->
                <div class="filter-section">
                    <h3 class="filter-title">Filtrar por Plataforma</h3>
                    <div class="filter-buttons">
                        <button class="filter-btn active" data-category="all">Todos</button>
                        <button class="filter-btn" data-category="steam">Steam</button>
                        <button class="filter-btn" data-category="psn">PlayStation</button>
                        <button class="filter-btn" data-category="xbox">Xbox</button>
                        <button class="filter-btn" data-category="nintendo">Nintendo</button>
                        <button class="filter-btn" data-category="android">Android/iOS</button>
                    </div>
                </div>

                <!-- Grid de Productos -->
                <div class="products-grid" id="productsGrid">
                    <!-- Steam Products -->
                    <div class="product-card floating-element" data-category="steam">
                        <img src="https://images.seeklogo.com/logo-png/30/1/steam-logo-png_seeklogo-306696.png" alt="Steam Wallet" class="product-image">
                        <h4 class="product-title">Steam Wallet $10</h4>
                        <p class="product-description">Tarjeta de regalo para Steam</p>
                        <div class="product-price">$10.25</div>
                        <button class="add-to-cart-btn" data-id="1" data-name="Steam Wallet $10" data-price="10.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="steam">
                        <img src="https://images.seeklogo.com/logo-png/30/1/steam-logo-png_seeklogo-306696.png" alt="Steam Wallet" class="product-image">
                        <h4 class="product-title">Steam Wallet $25</h4>
                        <p class="product-description">Tarjeta de regalo para Steam</p>
                        <div class="product-price">$25.63</div>
                        <button class="add-to-cart-btn" data-id="2" data-name="Steam Wallet $25" data-price="25.63">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="steam">
                        <img src="https://images.seeklogo.com/logo-png/30/1/steam-logo-png_seeklogo-306696.png" alt="Steam Wallet" class="product-image">
                        <h4 class="product-title">Steam Wallet $50</h4>
                        <p class="product-description">Tarjeta de regalo para Steam</p>
                        <div class="product-price">$51.25</div>
                        <button class="add-to-cart-btn" data-id="3" data-name="Steam Wallet $50" data-price="51.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="steam">
                        <img src="https://images.seeklogo.com/logo-png/30/1/steam-logo-png_seeklogo-306696.png" alt="Steam Wallet" class="product-image">
                        <h4 class="product-title">Steam Wallet $100</h4>
                        <p class="product-description">Tarjeta de regalo para Steam</p>
                        <div class="product-price">$102.50</div>
                        <button class="add-to-cart-btn" data-id="4" data-name="Steam Wallet $100" data-price="102.50">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <!-- PlayStation Products -->
                    <div class="product-card floating-element" data-category="psn">
                        <img src="https://images.seeklogo.com/logo-png/41/1/playstation-plus-logo-png_seeklogo-411713.png" alt="PSN Card" class="product-image">
                        <h4 class="product-title">PSN Card $10</h4>
                        <p class="product-description">Tarjeta de regalo para PlayStation</p>
                        <div class="product-price">$10.25</div>
                        <button class="add-to-cart-btn" data-id="5" data-name="PSN Card $10" data-price="10.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="psn">
                        <img src="https://images.seeklogo.com/logo-png/41/1/playstation-plus-logo-png_seeklogo-411713.png" alt="PSN Card" class="product-image">
                        <h4 class="product-title">PSN Card $25</h4>
                        <p class="product-description">Tarjeta de regalo para PlayStation</p>
                        <div class="product-price">$25.63</div>
                        <button class="add-to-cart-btn" data-id="6" data-name="PSN Card $25" data-price="25.63">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="psn">
                        <img src="https://images.seeklogo.com/logo-png/41/1/playstation-plus-logo-png_seeklogo-411713.png" alt="PSN Card" class="product-image">
                        <h4 class="product-title">PSN Card $50</h4>
                        <p class="product-description">Tarjeta de regalo para PlayStation</p>
                        <div class="product-price">$51.25</div>
                        <button class="add-to-cart-btn" data-id="7" data-name="PSN Card $50" data-price="51.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="psn">
                        <img src="https://images.seeklogo.com/logo-png/41/1/playstation-plus-logo-png_seeklogo-411713.png" alt="PSN Card" class="product-image">
                        <h4 class="product-title">PSN Card $100</h4>
                        <p class="product-description">Tarjeta de regalo para PlayStation</p>
                        <div class="product-price">$102.50</div>
                        <button class="add-to-cart-btn" data-id="8" data-name="PSN Card $100" data-price="102.50">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <!-- Xbox Products -->
                    <div class="product-card floating-element" data-category="xbox">
                        <img src="{{ asset('assets/images/Xbox_2019_Green_horizontal.svg') }}" alt="Xbox Gift Card" class="product-image">
                        <h4 class="product-title">Xbox Gift Card $10</h4>
                        <p class="product-description">Tarjeta de regalo para Xbox</p>
                        <div class="product-price">$10.25</div>
                        <button class="add-to-cart-btn" data-id="9" data-name="Xbox Gift Card $10" data-price="10.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="xbox">
                        <img src="{{ asset('assets/images/Xbox_2019_Green_horizontal.svg') }}" alt="Xbox Gift Card" class="product-image">
                        <h4 class="product-title">Xbox Gift Card $25</h4>
                        <p class="product-description">Tarjeta de regalo para Xbox</p>
                        <div class="product-price">$25.63</div>
                        <button class="add-to-cart-btn" data-id="10" data-name="Xbox Gift Card $25" data-price="25.63">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="xbox">
                        <img src="{{ asset('assets/images/Xbox_2019_Green_horizontal.svg') }}" alt="Xbox Gift Card" class="product-image">
                        <h4 class="product-title">Xbox Gift Card $50</h4>
                        <p class="product-description">Tarjeta de regalo para Xbox</p>
                        <div class="product-price">$51.25</div>
                        <button class="add-to-cart-btn" data-id="11" data-name="Xbox Gift Card $50" data-price="51.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="xbox">
                        <img src="{{ asset('assets/images/Xbox_2019_Green_horizontal.svg') }}" alt="Xbox Gift Card" class="product-image">
                        <h4 class="product-title">Xbox Gift Card $100</h4>
                        <p class="product-description">Tarjeta de regalo para Xbox</p>
                        <div class="product-price">$102.50</div>
                        <button class="add-to-cart-btn" data-id="12" data-name="Xbox Gift Card $100" data-price="102.50">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <!-- Nintendo Products -->
                    <div class="product-card floating-element" data-category="nintendo">
                        <img src="{{ asset('assets/images/nintendo_eshop.svg') }}" alt="Nintendo eShop" class="product-image">
                        <h4 class="product-title">Nintendo eShop $10</h4>
                        <p class="product-description">Tarjeta de regalo para Nintendo</p>
                        <div class="product-price">$10.25</div>
                        <button class="add-to-cart-btn" data-id="13" data-name="Nintendo eShop $10" data-price="10.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="nintendo">
                        <img src="{{ asset('assets/images/nintendo_eshop.svg') }}" alt="Nintendo eShop" class="product-image">
                        <h4 class="product-title">Nintendo eShop $25</h4>
                        <p class="product-description">Tarjeta de regalo para Nintendo</p>
                        <div class="product-price">$25.63</div>
                        <button class="add-to-cart-btn" data-id="14" data-name="Nintendo eShop $25" data-price="25.63">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="nintendo">
                        <img src="{{ asset('assets/images/nintendo_eshop.svg') }}" alt="Nintendo eShop" class="product-image">
                        <h4 class="product-title">Nintendo eShop $50</h4>
                        <p class="product-description">Tarjeta de regalo para Nintendo</p>
                        <div class="product-price">$51.25</div>
                        <button class="add-to-cart-btn" data-id="15" data-name="Nintendo eShop $50" data-price="51.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="nintendo">
                        <img src="{{ asset('assets/images/nintendo_eshop.svg') }}" alt="Nintendo eShop" class="product-image">
                        <h4 class="product-title">Nintendo eShop $100</h4>
                        <p class="product-description">Tarjeta de regalo para Nintendo</p>
                        <div class="product-price">$102.50</div>
                        <button class="add-to-cart-btn" data-id="16" data-name="Nintendo eShop $100" data-price="102.50">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <!-- Android/iOS Products -->
                    <div class="product-card floating-element" data-category="android">
                        <img src="{{ asset('assets/images/Google_Play_29.webp') }}" alt="Google Play" class="product-image">
                        <h4 class="product-title">Google Play $10</h4>
                        <p class="product-description">Tarjeta de regalo para Google Play</p>
                        <div class="product-price">$10.25</div>
                        <button class="add-to-cart-btn" data-id="17" data-name="Google Play $10" data-price="10.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="product-card floating-element" data-category="android">
                        <img src="{{ asset('assets/images/Apple_Gift_Card.svg') }}" alt="App Store" class="product-image">
                        <h4 class="product-title">App Store $10</h4>
                        <p class="product-description">Tarjeta de regalo para App Store</p>
                        <div class="product-price">$10.25</div>
                        <button class="add-to-cart-btn" data-id="18" data-name="App Store $10" data-price="10.25">
                            <i class="fas fa-cart-plus"></i> Añadir
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        // Configuración de partículas mejorada
        particlesJS('particles-bg', {
            particles: {
                number: {
                    value: 120,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: ["#00bfff", "#8a2be2", "#ff6b6b"]
                },
                shape: {
                    type: "circle",
                    stroke: {
                        width: 0,
                        color: "#000000"
                    }
                },
                opacity: {
                    value: 0.4,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 4,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 2,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#00bfff",
                    opacity: 0.3,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 3,
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
                        distance: 150,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 6
                    }
                }
            },
            retina_detect: true
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Filtros
            const filterButtons = document.querySelectorAll('.filter-btn');
            const productCards = document.querySelectorAll('.product-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remover clase active de todos los botones
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Agregar clase active al botón clickeado
                    this.classList.add('active');

                    const category = this.getAttribute('data-category');

                    productCards.forEach(card => {
                        if (category === 'all' || card.getAttribute('data-category') === category) {
                            card.style.display = 'block';
                            card.style.animation = 'none';
                            setTimeout(() => {
                                card.style.animation = 'float 3s ease-in-out infinite';
                            }, 10);
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });

            // Funcionalidad del carrito real
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    const productName = this.getAttribute('data-name');
                    const productPrice = this.getAttribute('data-price');

                    // Enviar al carrito usando fetch
                    fetch('/cart/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            name: productName,
                            price: productPrice,
                            quantity: 1
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Actualizar contador del carrito
                            const cartCount = document.getElementById('cart-count');
                            if (cartCount) {
                                cartCount.textContent = data.cart_count;
                            }
                            
                            // Mostrar notificación
                            this.innerHTML = '<i class="fas fa-check"></i> Añadido';
                            this.style.background = 'linear-gradient(90deg, #28a745, #20c997)';
                            
                            setTimeout(() => {
                                this.innerHTML = '<i class="fas fa-cart-plus"></i> Añadir';
                                this.style.background = 'linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple))';
                            }, 2000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error al añadir al carrito');
                    });
                });
            });
        });
    </script>
</x-app-layout> 