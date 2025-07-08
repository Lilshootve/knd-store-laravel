<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - KNDStore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <style>
        :root {
            --knd-neon-blue: #00bfff;
            --knd-electric-purple: #8a2be2;
            --knd-gunmetal-gray: #2c2c2c;
            --knd-black: #000000;
            --knd-white: #ffffff;
            --starlight: #e0d6f0;
            --accent-blue: #00bfff;
            --nebula-pink: #ff69b4;
            --cosmic-lavender: #8a2be2;
            --primary-purple: #8a2be2;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: var(--knd-black);
            color: var(--knd-white);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            margin: 0;
            padding: 0;
        }

        #particles-bg {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: 0;
            pointer-events: none;
        }

        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(1px 1px at 10% 20%, var(--starlight), transparent),
                radial-gradient(1px 1px at 90% 30%, var(--accent-blue), transparent),
                radial-gradient(1px 1px at 30% 80%, var(--nebula-pink), transparent),
                radial-gradient(1.5px 1.5px at 70% 60%, var(--cosmic-lavender), transparent);
            background-size: 300px 300px;
            z-index: -1;
            animation: twinkle 8s infinite alternate;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }

        .register-container {
            width: 100%;
            max-width: 900px;
            min-height: 0;
            background: rgba(44,44,44,0.92);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 0 25px rgba(0,191,255,0.15), 0 0 50px rgba(138,43,226,0.10), inset 0 0 15px rgba(0,0,0,0.3);
            border: 1px solid rgba(138,43,226,0.2);
            display: flex;
            margin: 2rem auto;
            position: relative;
            z-index: 2;
        }

        .left-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, rgba(0,191,255,0.1), rgba(138,43,226,0.1));
            position: relative;
        }

        .right-section {
            flex: 1;
            padding: 40px;
            background: rgba(44,44,44,0.95);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .knd-logo {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.8rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            text-align: center;
        }

        .right-section h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--knd-neon-blue);
            margin-bottom: 30px;
            text-align: center;
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 25px 0;
            color: var(--cosmic-lavender);
            font-size: 0.9rem;
            display: inline-block;
        }

        .divider::before,
        .divider::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--primary-purple), transparent);
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        .form-group {
            margin-bottom: 18px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: var(--starlight);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .input-with-icon {
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 12px 12px 12px 42px;
            background: var(--knd-gunmetal-gray);
            border: 1px solid var(--knd-electric-purple);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            color: var(--knd-white);
            height: 44px;
        }

        .form-group input:focus {
            border-color: var(--knd-neon-blue);
            box-shadow: 0 0 0 3px rgba(0,191,255,0.15);
            outline: none;
        }

        .form-group input::placeholder {
            color: rgba(224, 214, 240, 0.5);
        }

        .form-group .icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--cosmic-lavender);
            font-size: 18px;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--cosmic-lavender);
            transition: color 0.3s;
        }

        .toggle-password:hover {
            color: var(--accent-blue);
        }

        .terms {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .terms input {
            margin-top: 3px;
        }

        .terms label {
            color: var(--starlight);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .terms a {
            color: var(--accent-blue);
            text-decoration: none;
            font-weight: 500;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .btn-register {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple));
            color: var(--knd-white);
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,191,255,0.15);
            text-transform: uppercase;
        }

        .btn-register::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20px;
            height: 200%;
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(25deg);
            transition: all 0.4s;
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 25px var(--knd-electric-purple);
        }

        .btn-register:hover::after {
            left: 120%;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: var(--cosmic-lavender);
        }

        .login-link a {
            color: var(--knd-neon-blue);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            color: var(--knd-electric-purple);
        }

        /* Efecto de pulso en el botón */
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(142, 45, 226, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(142, 45, 226, 0); }
            100% { box-shadow: 0 0 0 0 rgba(142, 45, 226, 0); }
        }

        .btn-register {
            animation: pulse 2s infinite;
        }

        /* Clase para lectores de pantalla */
        .sr-only {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }

        /* Mejoras de foco para accesibilidad */
        .form-group input:focus,
        .btn-register:focus,
        .toggle-password:focus {
            outline: 2px solid var(--knd-neon-blue) !important;
            outline-offset: 2px !important;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .register-container {
                flex-direction: column;
                margin: 16px 0;
            }
            .left-section, .right-section {
                padding: 24px 8px;
            }
        }

        @media (max-width: 480px) {
            .left-section, .right-section {
                padding: 25px;
            }

            .knd-logo {
                font-size: 2.2rem;
            }

            .right-section h2 {
                font-size: 1.8rem;
            }

            .form-group input {
                padding: 15px 15px 15px 40px;
            }
        }
    </style>
</head>
<body>
    <div id="particles-bg"></div>
    <div class="register-container position-relative" style="z-index:2;">
        <div id="particles-js" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:1;"></div>  
        <div class="left-section" style="position:relative;z-index:2;align-items:center;justify-content:center;text-align:center;width:100%;">
            <a href="{{ route('store') }}" style="display:flex;justify-content:center;width:100%;">
                <img src="{{ asset('assets/images/knd-logo.png') }}" alt="KND Logo" height="240" style="margin-bottom:10px;display:block;margin-left:auto;margin-right:auto;">
            </a>
        </div>
        <div class="right-section" style="position:relative;z-index:2;">
            <h2>Crear Cuenta</h2>
            
            @if ($errors->any())
                <div role="alert" aria-live="polite" style="background:rgba(255,100,100,0.2); padding:12px; border-radius:6px; margin-bottom:15px; color:#ff6666; border-left: 4px solid #ff6666;">
                    <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif
            
            <form method="POST" action="{{ route('register') }}" id="registerForm" aria-label="Formulario de registro">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user icon" aria-hidden="true"></i>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="Tu nombre completo"
                               aria-describedby="name-help"
                               aria-required="true"
                               autocomplete="name">
                    </div>
                    <div id="name-help" class="sr-only">Ingresa tu nombre completo</div>
        </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope icon" aria-hidden="true"></i>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               placeholder="tu@email.com"
                               aria-describedby="email-help"
                               aria-required="true"
                               autocomplete="email">
                    </div>
                    <div id="email-help" class="sr-only">Ingresa tu dirección de correo electrónico</div>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="input-with-icon password-container">
                        <i class="fas fa-lock icon" aria-hidden="true"></i>
                        <input type="password"
                               id="password"
                            name="password"
                               required
                               placeholder="Tu contraseña"
                               aria-describedby="password-help"
                               aria-required="true"
                               autocomplete="new-password">
                        <button type="button"
                                class="toggle-password"
                                onclick="togglePassword('password')"
                                aria-label="Mostrar u ocultar contraseña"
                                aria-pressed="false">
                            <i class="fas fa-eye" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div id="password-help" class="sr-only">Ingresa tu contraseña</div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <div class="input-with-icon password-container">
                        <i class="fas fa-lock icon" aria-hidden="true"></i>
                        <input type="password"
                               id="password_confirmation"
                               name="password_confirmation"
                               required
                               placeholder="Confirma tu contraseña"
                               aria-describedby="confirmPassword-help"
                               aria-required="true"
                               autocomplete="new-password">
                        <button type="button"
                                class="toggle-password"
                                onclick="togglePassword('password_confirmation')"
                                aria-label="Mostrar u ocultar confirmación de contraseña"
                                aria-pressed="false">
                            <i class="fas fa-eye" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div id="confirmPassword-help" class="sr-only">Confirma tu contraseña para verificar que coincida</div>
        </div>

                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                        Acepto los <a href="#" target="_blank">Términos y Condiciones</a> y la <a href="#" target="_blank">Política de Privacidad</a>
                    </label>
        </div>

                <button type="submit"
                        class="btn-register"
                        aria-describedby="submit-help">
                    <i class="fas fa-user-plus" aria-hidden="true"></i>
                    Crear Cuenta
                </button>
                <div id="submit-help" class="sr-only">Haz clic para crear tu cuenta con los datos ingresados</div>      
            </form>
            <div class="login-link" style="margin-top:20px;">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        // Función mejorada para toggle de contraseña
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const toggleBtn = field.parentElement.querySelector('.toggle-password');
            const icon = toggleBtn.querySelector('i');

            if (field.type === 'password') {
                field.type = 'text';
                icon.className = 'fas fa-eye-slash';
                toggleBtn.setAttribute('aria-label', 'Ocultar contraseña');
                toggleBtn.setAttribute('aria-pressed', 'true');
            } else {
                field.type = 'password';
                icon.className = 'fas fa-eye';
                toggleBtn.setAttribute('aria-label', 'Mostrar contraseña');
                toggleBtn.setAttribute('aria-pressed', 'false');
            }
        }

        // Función para manejo de errores de accesibilidad
        function announceToScreenReader(message) {
            const announcement = document.createElement('div');
            announcement.setAttribute('aria-live', 'polite');
            announcement.setAttribute('aria-atomic', 'true');
            announcement.className = 'sr-only';
            announcement.textContent = message;
            document.body.appendChild(announcement);

            setTimeout(() => {
                document.body.removeChild(announcement);
            }, 1000);
        }

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
            // Partículas en el fondo del formulario
            particlesJS('particles-js', {
                particles: {
                    number: { value: 40, density: { enable: true, value_area: 600 } },
                    color: { value: "#00bfff" },
                    shape: { type: "circle" },
                    opacity: { value: 0.25, random: true },
                    size: { value: 2.5, random: true },
                    line_linked: {
                        enable: true,
                        distance: 120,
                        color: "#8a2be2",
                        opacity: 0.18,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 1.5,
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
        });
    </script>
</body>
</html>
