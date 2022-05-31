<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Type;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        $types = Type::all();

        return response()->json([
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
}
