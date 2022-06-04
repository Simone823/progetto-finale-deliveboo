<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Type;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        // Recupero dal db le tipologie e le ordine per nome 
        $types = Type::orderBy('type_name', 'ASC')->get();

        // Return view auth register 
        return view('auth.register', compact('types'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'surname' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'p_iva' => ['required', 'numeric', 'digits:11', 'unique:users,p_iva'],
            'business_name' => ['required', 'string', 'min:3', 'max:200'],
            'types' => ['required', 'exists:types,id'],
            'business_city' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Slug
        $slug = User::getUniqueSlug($data['business_name']);

        // Se esiste il valore del campo business_image
        if (array_key_exists('business_image', $data)) {

            // Salvo il path dell'immagine e la pusho su storage uploads 
            $img_path = Storage::put('uploads', $data['business_image']);

            // Imposto il valore dell'immagine utente uguale a img_path
            $data['business_image'] = $img_path;
        } else {

            // Img path image null
            $img_path = Storage::putFile('uploads', "img/placeholder_restaurants.png");

            // Valore dato business_image uguale a img_path
            $data['business_image'] = $img_path;
        }

        // Creo un nuovo utente con metedo create
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'p_iva' => $data['p_iva'],
            'business_name' => $data['business_name'],
            'business_slug' => $slug,
            'business_city' => $data['business_city'],
            'business_cap' => $data['business_cap'],
            'business_address' => $data['business_address'],
            'business_image' => $img_path,
        ]);

        // Attach tiplogie ristorante inserite dall'utente tramite checkbox
        $user->types()->attach($data['types']);

        // Ritorno il nuovo utente
        return $user;
    }
}
