<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.logged');
    }

    // Homepage
    public function homepage() {

        // Recupero i dati dell'utente autenticato
        $user = Auth::user();

        // Return view admin homepage
        return view('admin.homepage', compact('user'));
    }
}
