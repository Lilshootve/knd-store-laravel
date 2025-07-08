<x-app-layout>
    <style>
        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .cart-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .cart-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--knd-neon-blue);
            margin-bottom: 1rem;
        }

        .cart-subtitle {
            color: #ccc;
            font-size: 1.1rem;
        }

        .cart-empty {
            text-align: center;
            padding: 4rem 2rem;
            background: rgba(0,0,0,0.8);
            border-radius: 12px;
            border: 1px solid rgba(0,191,255,0.2);
        }

        .cart-empty-icon {
            font-size: 4rem;
            color: var(--knd-neon-blue);
            margin-bottom: 2rem;
        }

        .cart-empty-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            color: var(--knd-white);
            margin-bottom: 1rem;
        }

        .cart-empty-text {
            color: #ccc;
            margin-bottom: 2rem;
        }

        .cart-items {
            background: rgba(0,0,0,0.8);
            border-radius: 12px;
            border: 1px solid rgba(0,191,255,0.2);
            overflow: hidden;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            transition: background-color 0.3s ease;
        }

        .cart-item:hover {
            background: rgba(0,191,255,0.05);
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-info {
            flex: 1;
            margin-right: 2rem;
        }

        .item-name {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            color: var(--knd-white);
            margin-bottom: 0.5rem;
        }

        .item-price {
            color: var(--knd-electric-purple);
            font-size: 1.1rem;
            font-weight: 600;
        }

        .item-quantity {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 0 2rem;
        }

        .quantity-btn {
            background: transparent;
            border: 1px solid rgba(0,191,255,0.5);
            color: var(--knd-neon-blue);
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover {
            background: rgba(0,191,255,0.1);
            transform: scale(1.1);
        }

        .quantity-input {
            background: transparent;
            border: 1px solid rgba(0,191,255,0.3);
            color: var(--knd-white);
            text-align: center;
            width: 60px;
            padding: 0.5rem;
            border-radius: 6px;
            font-family: 'Orbitron', sans-serif;
        }

        .item-subtotal {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.3rem;
            color: var(--knd-neon-blue);
            font-weight: 600;
            margin: 0 2rem;
            min-width: 100px;
            text-align: right;
        }

        .remove-btn {
            background: transparent;
            border: 1px solid rgba(255,0,0,0.5);
            color: #ff4444;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remove-btn:hover {
            background: rgba(255,0,0,0.1);
            transform: scale(1.05);
        }

        .cart-summary {
            background: rgba(0,0,0,0.8);
            border-radius: 12px;
            border: 1px solid rgba(0,191,255,0.2);
            padding: 2rem;
            margin-top: 2rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.5rem 0;
        }

        .summary-label {
            color: #ccc;
            font-size: 1.1rem;
        }

        .summary-value {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            color: var(--knd-white);
            font-weight: 600;
        }

        .summary-total {
            border-top: 2px solid rgba(0,191,255,0.3);
            padding-top: 1rem;
            margin-top: 1rem;
        }

        .summary-total .summary-label {
            font-size: 1.3rem;
            color: var(--knd-neon-blue);
        }

        .summary-total .summary-value {
            font-size: 1.5rem;
            color: var(--knd-electric-purple);
        }

        .cart-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: center;
        }

        .btn-clear {
            background: transparent;
            border: 1px solid rgba(255,0,0,0.5);
            color: #ff4444;
            padding: 1rem 2rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
        }

        .btn-clear:hover {
            background: rgba(255,0,0,0.1);
            transform: translateY(-2px);
        }

        .btn-checkout {
            background: linear-gradient(90deg, var(--knd-neon-blue), var(--knd-electric-purple));
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
        }

        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,191,255,0.4);
        }

        .btn-continue {
            background: transparent;
            border: 1px solid rgba(0,191,255,0.5);
            color: var(--knd-neon-blue);
            padding: 1rem 2rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-continue:hover {
            background: rgba(0,191,255,0.1);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .item-info {
                margin-right: 0;
            }

            .item-quantity {
                margin: 1rem 0;
            }

            .item-subtotal {
                margin: 0;
            }

            .cart-actions {
                flex-direction: column;
            }
        }
    </style>

    <div class="cart-container">
        <div class="cart-header">
            <h1 class="cart-title">TU CARRITO</h1>
            <p class="cart-subtitle">Revisa tus productos seleccionados</p>
        </div>

        @if($cart->isEmpty())
            <div class="cart-empty">
                <div class="cart-empty-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h2 class="cart-empty-title">Tu carrito está vacío</h2>
                <p class="cart-empty-text">Aún no has agregado productos a tu carrito. ¡Explora nuestra tienda y encuentra lo que buscas!</p>
                <a href="{{ route('store') }}" class="btn-continue">
                    <i class="fas fa-arrow-left"></i> Continuar Comprando
                </a>
            </div>
        @else
            <div class="cart-items">
                @foreach($items as $item)
                    <div class="cart-item" data-item-id="{{ $item->id }}">
                        <div class="item-info">
                            <div class="item-name">{{ $item->product_name }}</div>
                            <div class="item-price">${{ number_format($item->price, 2) }} c/u</div>
                        </div>
                        
                        <div class="item-quantity">
                            <button class="quantity-btn" onclick="updateQuantity({{ $item->id }}, -1)">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="quantity-input" value="{{ $item->quantity }}" 
                                   min="1" onchange="updateQuantity({{ $item->id }}, this.value, true)">
                            <button class="quantity-btn" onclick="updateQuantity({{ $item->id }}, 1)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        
                        <div class="item-subtotal">
                            ${{ number_format($item->getSubtotal(), 2) }}
                        </div>
                        
                        <button class="remove-btn" onclick="removeItem({{ $item->id }})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                @endforeach
            </div>

            <div class="cart-summary">
                <div class="summary-row">
                    <span class="summary-label">Subtotal:</span>
                    <span class="summary-value">${{ number_format($cart->total, 2) }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Envío:</span>
                    <span class="summary-value">Gratis</span>
                </div>
                <div class="summary-row summary-total">
                    <span class="summary-label">Total:</span>
                    <span class="summary-value">${{ number_format($cart->total, 2) }}</span>
                </div>
            </div>

            <div class="cart-actions">
                <button class="btn-clear" onclick="clearCart()">
                    <i class="fas fa-trash"></i> Limpiar Carrito
                </button>
                <a href="{{ route('store') }}" class="btn-continue">
                    <i class="fas fa-arrow-left"></i> Continuar Comprando
                </a>
                <button class="btn-checkout" onclick="checkout()">
                    <i class="fas fa-credit-card"></i> Proceder al Pago
                </button>
            </div>
        @endif
    </div>

    <script>
        function updateQuantity(itemId, change, isDirectInput = false) {
            let quantity;
            
            if (isDirectInput) {
                quantity = parseInt(change);
            } else {
                const input = document.querySelector(`[data-item-id="${itemId}"] .quantity-input`);
                quantity = parseInt(input.value) + parseInt(change);
            }
            
            if (quantity < 1) return;

            fetch(`/cart/update/${itemId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function removeItem(itemId) {
            if (!confirm('¿Estás seguro de que quieres remover este producto?')) return;

            fetch(`/cart/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function clearCart() {
            if (!confirm('¿Estás seguro de que quieres limpiar todo el carrito?')) return;

            fetch('/cart/clear', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function checkout() {
            alert('Funcionalidad de checkout en desarrollo. ¡Pronto disponible!');
        }
    </script>
</x-app-layout> 