<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KND Store - Cargando</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --knd-neon-blue: #00bfff;
            --knd-electric-purple: #8a2be2;
            --knd-gunmetal-gray: #2c2c2c;
            --knd-black: #000000;
            --knd-white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: var(--knd-black);
            color: var(--knd-white);
            overflow: hidden;
            height: 100vh;
            width: 100vw;
        }

        #loading-container {
            position: relative;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: radial-gradient(ellipse at center, rgba(0,0,0,0.8) 0%, rgba(0,0,0,1) 100%);
        }

        #particles-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .loading-content {
            position: relative;
            z-index: 10;
            text-align: center;
            animation: fadeInUp 1.5s ease-out;
        }

        .logo-container {
            margin-bottom: 3rem;
            animation: logoGlow 2s ease-in-out infinite alternate;
        }

        .logo {
            height: 120px;
            width: auto;
            filter: drop-shadow(0 0 20px var(--knd-neon-blue));
            animation: logoPulse 3s ease-in-out infinite;
        }

        .loading-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            animation: titleGlow 2s ease-in-out infinite alternate;
        }

        .loading-subtitle {
            font-size: 1.1rem;
            color: #ccc;
            margin-bottom: 3rem;
            animation: fadeIn 2s ease-out 0.5s both;
        }

        .progress-container {
            width: 300px;
            height: 6px;
            background: rgba(255,255,255,0.1);
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 2rem;
            position: relative;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple));
            border-radius: 3px;
            width: 0%;
            transition: width 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: shimmer 2s infinite;
        }

        .loading-text {
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            color: var(--knd-neon-blue);
            margin-bottom: 2rem;
            animation: textPulse 1.5s ease-in-out infinite;
        }

        .loading-stats {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin-top: 2rem;
            opacity: 0;
            animation: fadeIn 1s ease-out 1s both;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--knd-electric-purple);
            display: block;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #ccc;
            margin-top: 0.5rem;
        }

        .loading-message {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
            color: #666;
            opacity: 0;
            animation: fadeIn 1s ease-out 2s both;
        }

        /* Efectos adicionales */
        .loading-content::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            right: -50px;
            bottom: -50px;
            background: radial-gradient(circle, rgba(0,191,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 4s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.2); opacity: 0.6; }
        }

        .progress-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(0,191,255,0.2), transparent);
            animation: scan 3s linear infinite;
        }

        @keyframes scan {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes logoGlow {
            from { filter: drop-shadow(0 0 20px var(--knd-neon-blue)); }
            to { filter: drop-shadow(0 0 30px var(--knd-electric-purple)); }
        }

        @keyframes logoPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes titleGlow {
            from { text-shadow: 0 0 10px var(--knd-neon-blue); }
            to { text-shadow: 0 0 20px var(--knd-electric-purple); }
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        @keyframes textPulse {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }

        /* Efectos de partículas */
        .particle {
            position: absolute;
            background: var(--knd-neon-blue);
            border-radius: 50%;
            pointer-events: none;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .loading-title {
                font-size: 2rem;
            }
            
            .logo {
                height: 80px;
            }
            
            .progress-container {
                width: 250px;
            }
            
            .loading-stats {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div id="loading-container">
        <div id="particles-bg"></div>
        
        <div class="loading-content">
            <div class="logo-container">
                <img src="{{ asset('assets/images/knd-logo.png') }}" alt="KND Store" class="logo">
            </div>
            
            <h1 class="loading-title">KND STORE</h1>
            <p class="loading-subtitle">Cargando experiencia futurista...</p>
            
            <div class="progress-container">
                <div class="progress-bar" id="progressBar"></div>
            </div>
            
            <div class="loading-text" id="loadingText">Inicializando sistemas...</div>
            
            <div class="loading-stats">
                <div class="stat-item">
                    <span class="stat-number" id="productsCount">0</span>
                    <span class="stat-label">Productos</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" id="categoriesCount">0</span>
                    <span class="stat-label">Categorías</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" id="usersCount">0</span>
                    <span class="stat-label">Usuarios</span>
                </div>
            </div>
        </div>
        
        <div class="loading-message">
            Preparando tu experiencia de gaming y biker...
        </div>
        
        <!-- Botón para saltar loading -->
        <button id="skipLoading" style="
            position: absolute;
            top: 2rem;
            right: 2rem;
            background: transparent;
            border: 1px solid rgba(0,191,255,0.5);
            color: var(--knd-neon-blue);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0;
            animation: fadeIn 1s ease-out 3s both;
        " onmouseover="this.style.background='rgba(0,191,255,0.1)'" onmouseout="this.style.background='transparent'">
            <i class="fas fa-forward"></i> Saltar
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        // Configuración de partículas
        particlesJS('particles-bg', {
            particles: {
                number: { 
                    value: 80, 
                    density: { enable: true, value_area: 800 } 
                },
                color: { 
                    value: ["#00bfff", "#8a2be2"] 
                },
                shape: { 
                    type: "circle" 
                },
                opacity: { 
                    value: 0.5, 
                    random: true,
                    anim: {
                        enable: true,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: { 
                    value: 3, 
                    random: true 
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#00bfff",
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
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

        // Simulación de carga
        const loadingMessages = [
            "Inicializando sistemas...",
            "Cargando productos...",
            "Conectando con servidores...",
            "Preparando interfaz...",
            "Optimizando rendimiento...",
            "Cargando categorías...",
            "Sincronizando datos...",
            "¡Listo para explorar!"
        ];

        const progressBar = document.getElementById('progressBar');
        const loadingText = document.getElementById('loadingText');
        const productsCount = document.getElementById('productsCount');
        const categoriesCount = document.getElementById('categoriesCount');
        const usersCount = document.getElementById('usersCount');

        let progress = 0;
        let messageIndex = 0;

        function updateProgress() {
            if (progress < 100) {
                progress += Math.random() * 15;
                if (progress > 100) progress = 100;
                
                progressBar.style.width = progress + '%';
                
                // Actualizar mensaje
                if (progress > (messageIndex + 1) * 12.5) {
                    messageIndex = Math.min(messageIndex + 1, loadingMessages.length - 1);
                    loadingText.textContent = loadingMessages[messageIndex];
                }
                
                // Actualizar contadores con datos reales
                if (progress > 20) {
                    const targetProducts = {{ $stats['products'] ?? 150 }};
                    const currentProducts = Math.floor((progress - 20) * targetProducts / 80);
                    productsCount.textContent = Math.min(currentProducts, targetProducts);
                }
                if (progress > 40) {
                    const targetCategories = {{ $stats['categories'] ?? 4 }};
                    const currentCategories = Math.floor((progress - 40) * targetCategories / 60);
                    categoriesCount.textContent = Math.min(currentCategories, targetCategories);
                }
                if (progress > 60) {
                    const targetUsers = {{ $stats['users'] ?? 0 }};
                    const currentUsers = Math.floor((progress - 60) * targetUsers / 40);
                    usersCount.textContent = Math.min(currentUsers, targetUsers);
                }
                
                setTimeout(updateProgress, 100 + Math.random() * 200);
            } else {
                // Efecto de transición antes de redirigir
                document.getElementById('loading-container').style.transition = 'all 1s ease-out';
                document.getElementById('loading-container').style.opacity = '0';
                document.getElementById('loading-container').style.transform = 'scale(0.95)';
                
                // Redirigir a la página principal
                setTimeout(() => {
                    window.location.href = '{{ route("store") }}';
                }, 1000);
            }
        }

        // Iniciar carga
        setTimeout(updateProgress, 500);

        // Funcionalidad del botón skip
        document.getElementById('skipLoading').addEventListener('click', function() {
            // Efecto de transición rápida
            document.getElementById('loading-container').style.transition = 'all 0.5s ease-out';
            document.getElementById('loading-container').style.opacity = '0';
            document.getElementById('loading-container').style.transform = 'scale(0.9)';
            
            // Redirigir inmediatamente
            setTimeout(() => {
                window.location.href = '{{ route("store") }}';
            }, 500);
        });
    </script>
</body>
</html> 