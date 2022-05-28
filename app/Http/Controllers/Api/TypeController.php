<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public function welcome(){
        $types = Type::all();
        //ritorno i tipi sottoforma di json
        return response()->json([
            'typres' => $types,
        ]);
    }
}
