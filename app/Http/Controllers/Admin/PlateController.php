<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Plate;
use App\User;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //salvo in una variabile l'id dell'utente loggato
        $id_user = Auth::id();
        //prendo dalla tabella plates i piatti corrispondenti all'id dell'utente loggato
        $plates = Plate::where('user_id', '=' ,$id_user)
            ->orderBy('name', 'ASC')
            ->get();

        $user = User::where('id', '=' , $id_user)->first();

        return view('admin.plates.index', compact('plates','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Plate $plate)
    {
        return view('admin.plates.create', compact('plate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //faccio la validazione dei dati inseriti nel form
        $request->validate([
            'name' => 'required|string|min:4|max:200',
            'ingredients' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|file',
        ]);

        $id_user = Auth::id();

        //salvo in data tutti i dati arrivati dal form
        $data = $request->all();
        //creo uno slug unico per il piatto
        $slug = User::getUniqueSlug( $data['name'] );
        //salvo i dati nel nuovo piatto
        $plate = new Plate();
        $plate->fill( $data );
        $plate->user_id = $id_user;
        $plate->slug = $slug;
        $plate->save();
        //reindirizzo alla pagina index dei piatti
        return redirect()->route('admin.plates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
