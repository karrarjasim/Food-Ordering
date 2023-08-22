<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Home', [
            'restaurants' => Restaurant::get(),
            'restaurant_name' => auth()->user()?->restaurant?->name,
        ]);
    }
}
