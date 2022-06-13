<?php

use App\Type;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Array utenti
        $arrayUsers = [
            [
                'name' => 'Simone',
                'surname' => 'Daglio',
                'email' => 'simone.daglio823@outlook.it',
                'password' => 'prova1234',
                'p_iva' => 'IT23586934023',
                'business_name' => "L'Antico Cappello",
                'business_city' => "Alessandria",
                'business_cap' => "15012",
                'business_address' => 'Via Dei Cappellai N 48',
                'business_image' => "uploads/ristorante1.png",
            ],

            [
                'name' => 'Alessandro',
                'surname' => 'Micalizzi',
                'email' => 'alessandro.micalizzi08@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT12585639978',
                'business_name' => "Rosticceria Da Alessandro",
                'business_city' => "Messina",
                'business_cap' => "12567",
                'business_address' => "Via Dell'Arancino N 56",
                'business_image' => "uploads/ristorante2.png",
            ],

            [
                'name' => 'Angelo',
                'surname' => 'Guarnieri',
                'email' => 'a@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT99705645945',
                'business_name' => "La Brace Accesa",
                'business_city' => "Bari",
                'business_cap' => "67456",
                'business_address' => "Via La Brascioula N 234",
                'business_image' => "uploads/ristorante3.png",
            ],

            [
                'name' => 'Giovanni',
                'surname' => 'Nicolosi',
                'email' => 'nicolosigiov@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT07686639458',
                'business_name' => "Da Brando",
                'business_city' => "Catania",
                'business_cap' => "10784",
                'business_address' => "Via Col Vento N 100",
                'business_image' => "uploads/ristorante4.png",
            ],
            [
                'name' => 'Matteo',
                'surname' => 'Franco',
                'email' => 'mattfranco@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT06689039400',
                'business_name' => "Da Franco",
                'business_city' => "Roma",
                'business_cap' => "65321",
                'business_address' => "Via S Franco 100",
                'business_image' => "uploads/ristorante6.png",
            ],
            [
                'name' => 'Martina',
                'surname' => 'Pecco',
                'email' => 'peccomart@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT09128939723',
                'business_name' => "Pecco Pizzeria",
                'business_city' => "Riccione",
                'business_cap' => "87127",
                'business_address' => "Via Cavalli 80",
                'business_image' => "uploads/ristorante7.png",
            ],
            [
                'name' => 'Fabio',
                'surname' => 'Perla',
                'email' => 'perlaf@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT04384568912',
                'business_name' => "Ristorante La Perla",
                'business_city' => "Milano",
                'business_cap' => "12039",
                'business_address' => "Via Lino 22",
                'business_image' => "uploads/ristorante8.png",
            ],
            [
                'name' => 'Federico',
                'surname' => 'Fusaro',
                'email' => 'fusatofed@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT07808939531',
                'business_name' => "Il Marinaio",
                'business_city' => "Cuneo",
                'business_cap' => "87123",
                'business_address' => "Via Roma 65",
                'business_image' => "uploads/ristorante9.png",
            ],
            [
                'name' => 'Francesco',
                'surname' => 'Lupari',
                'email' => 'franc@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT07685739456',
                'business_name' => "La Lanterna",
                'business_city' => "Milano",
                'business_cap' => "45668",
                'business_address' => "Piazza Roma 45",
                'business_image' => "uploads/ristorante10.png",
            ],
            [
                'name' => 'Andrea',
                'surname' => 'Gupi',
                'email' => 'gupiandre@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT01689039018',
                'business_name' => "La Locanda Dei Gufi",
                'business_city' => "Trento",
                'business_cap' => "99008",
                'business_address' => "Via Arco 33",
                'business_image' => "uploads/ristorante11.png",
            ],
            [
                'name' => 'Nicola',
                'surname' => 'ferni',
                'email' => 'ferni@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT45091278901',
                'business_name' => "U Piscaturi",
                'business_city' => "Napoli",
                'business_cap' => "56678",
                'business_address' => "Piazza Dante 20",
                'business_image' => "uploads/ristorante12.png",
            ],
            [
                'name' => 'Mario',
                'surname' => 'Mari',
                'email' => 'mariomari@gmail.com',
                'password' => 'prova1234',
                'p_iva' => 'IT09159812340',
                'business_name' => "Pizzeria Mammamia",
                'business_city' => "Palermo",
                'business_cap' => "65668",
                'business_address' => "Via Sicilia 200",
                'business_image' => "uploads/ristorante13.png",
            ]
            
        ];

        //recupero tipologie
        $types = Type::all();
        $typesId = $types->pluck('id')->all();

        // Foreach array users
        foreach($arrayUsers as $user) {

            // Business slug
            $slug = User::getUniqueSlug($user['business_name']);

            // Creo un nuovo utente
            $new_user = new User();

            // Imposto le proprietà
            $new_user->name = $user['name'];
            $new_user->surname = $user['surname'];
            $new_user->email = $user['email'];
            $new_user->password = Hash::make($user['password']);
            $new_user->p_iva = $user['p_iva'];
            $new_user->business_name = $user['business_name'];
            $new_user->business_slug = $slug;
            $new_user->business_city = $user['business_city'];
            $new_user->business_cap = $user['business_cap'];
            $new_user->business_address = $user['business_address'];
            $new_user->business_image = $user['business_image'];
            $new_user->email_verified_at = now();

            // Salvo il nuovo utente
            $new_user->save();

            $randomType = $faker->randomElements($typesId, 4);
            $new_user->types()->attach($randomType);
        }
    }
}
