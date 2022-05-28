<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public function welcome() {
        //prendo tutte le tipologie in ordine alfabetico
        $types = Type::all();
        //restituisco le tipologie alla view welcome
        return view('welcome', compact('types'));
    }
}
