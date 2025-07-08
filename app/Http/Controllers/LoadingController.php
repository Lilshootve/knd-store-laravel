<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoadingController extends Controller
{
    public function index()
    {
        // Obtener estadísticas reales de la aplicación
        $stats = [
            'products' => 150, // Simulado - en el futuro vendría de un modelo Product
            'categories' => 4, // Las categorías que tenemos: consolas, giftcards, accesorios gamer, accesorios bikers
            'users' => User::count(),
        ];

        return view('loading', compact('stats'));
    }
} 