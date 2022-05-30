<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Homepage
    public function homepage()
    {

        // Recupero i dati dell'utente autenticato
        $user = Auth::user();

        // Return view admin homepage
        return view('admin.homepage', compact('user'));
    }

    public function index()
    {
        return view('admin.logged');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        // Recupero i dati dell'utente loggato
        $user = Auth::user();

        // >Recupero le tipologie
        $types = Type::orderBy('type_name', 'ASC')->get();

        // Return view admin.user.edit
        return view('admin.user.edit', compact('user', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        // Salvo la richiesta nella variabile data
        $data = $request->all();

        // Validazione dati reuqest
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3', 'regex:/^[a-zA-Z]+$/'],
            'surname' => ['required', 'string', 'max:255', 'min:3', 'regex:/^[a-zA-Z]+$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'p_iva' => $user->p_iva,
            'business_name' => ['required', 'string', 'max:200'],
            'types' => ['required', 'exists:types,id'],
            'business_city' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z]+$/'],
            'business_cap' => ['required', 'numeric', 'digits:5'],
            'business_address' => ['required', 'string', 'max:255'],
            'business_image' => ['nullable', 'file', 'image', 'mimetypes:image/jpeg,image/png,image/svg', 'max:2048'],
        ],
        [
            //messaggi d'errore custom
            'name.regex' => 'Il nome può contenere solo lettere',
            'surname.regex' => 'Il cognome può contenere solo lettere',
            'business_city.regex' => 'La città può contenere solo lettere',
        ]);

        // Imposto user business_slug con metodo statico User model uguale a data -> business_name
        $user->business_slug = User::getUniqueSlug($data['business_name']);

        // Se esiste il valore del campo business_image
        if(array_key_exists('business_image', $data)) {

            // Salvo il path dell'immagine e la pusho su storage uploads 
            $img_path = Storage::put('uploads', $data['business_image']);

            // Imposto il valore dell'immagine utente uguale a img_path
            $data['business_image'] = $img_path;
        } else {

            // Img path = user->business_image 
            $img_path = $user['business_image'];

            // Valore dato business_image uguale a img_path
            $data['business_image'] = $img_path;
        }

        // Controllo se esiste la tipologia la aggiorno
        if (array_key_exists('types', $data)) {
            // Sync
            $user->types()->sync($data['types']);
        }

        // Salvo la modifica dei dati
        $user->update($data);

        // Return redirect route admin homepage
        return redirect()->route('admin.homepage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // User delete
        $user->delete();

        // Return redirect url /
        return redirect()->away('/');
    }
}
