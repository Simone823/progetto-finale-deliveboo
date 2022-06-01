<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Type;

class UserController extends Controller
{

    public function index(){
        //prendo tutti gli utenti con tutte le rispettive categorie
        $users_type = User::join('type_user','type_user.user_id','=','users.id')
            ->join('types','types.id','=','type_user.type_id')
            ->get();
        $users = User::all();
        $types = Type::all();

        return response()->json([
            'users_type' => $users_type,
            'users' => $users,
            'types' => $types,
        ]);
    }

    public function showTypes($id)
    {
        //tramite query e  join prendo i ristoratori che hanno quella determinata tipologia
        $users = User::join('type_user','type_user.user_id','=','users.id')
            ->join('types','types.id','=','type_user.type_id')
            ->where('type_user.type_id','=', $id)
            ->get();

        return response()->json([
            'users' => $users,
        ]);

        // SELECT * FROM `users`
        // INNER JOIN `type_user`
        // ON `type_user`.`user_id` = `users`.`id`
        // INNER JOIN `types`
        // ON `types`.`id` = `type_user`.`type_id`
        // WHERE `type_user`.`type_id` = $id
    }

    public function showMenu($id)
    {
        // prendo l'utente specifico, tramite l'id dell'utente che viene cliccato in CityResturant
        $user = User::where('id', '=', $id)->get();
        //prendo tutti i piatti che hanno lo user_id corrispondente all'id dell'utente
        $user_plates = User::join('plates','plates.user_id','=','users.id')
            ->where('plates.user_id', '=', $id)
            ->get();

        return response()->json([
            'user' => $user,
            'user_plates' => $user_plates,
        ]);
    }
}
