<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'total'
    ];

    protected $casts = [
        'total' => 'decimal:2'
    ];

    /**
     * Relación con el usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con los items del carrito
     */
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Calcular el total del carrito
     */
    public function calculateTotal()
    {
        $this->total = $this->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $this->save();
        return $this->total;
    }

    /**
     * Obtener el número total de items
     */
    public function getItemCount()
    {
        return $this->items->sum('quantity');
    }

    /**
     * Verificar si el carrito está vacío
     */
    public function isEmpty()
    {
        return $this->items->count() === 0;
    }

    /**
     * Limpiar el carrito
     */
    public function clear()
    {
        $this->items()->delete();
        $this->total = 0;
        $this->save();
    }
}
