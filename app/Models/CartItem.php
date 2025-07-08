<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_name',
        'product_id',
        'price',
        'quantity',
        'product_data'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
        'product_data' => 'array'
    ];

    /**
     * Relación con el carrito
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Calcular el subtotal del item
     */
    public function getSubtotal()
    {
        return $this->price * $this->quantity;
    }

    /**
     * Incrementar la cantidad
     */
    public function incrementQuantity($amount = 1)
    {
        $this->quantity += $amount;
        $this->save();
        $this->cart->calculateTotal();
    }

    /**
     * Decrementar la cantidad
     */
    public function decrementQuantity($amount = 1)
    {
        if ($this->quantity > $amount) {
            $this->quantity -= $amount;
            $this->save();
        } else {
            $this->delete();
        }
        $this->cart->calculateTotal();
    }

    /**
     * Actualizar la cantidad
     */
    public function updateQuantity($quantity)
    {
        if ($quantity > 0) {
            $this->quantity = $quantity;
            $this->save();
        } else {
            $this->delete();
        }
        $this->cart->calculateTotal();
    }
}
