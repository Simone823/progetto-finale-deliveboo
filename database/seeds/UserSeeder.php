<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array utenti
        $arrayUsers = [
            [
                'name' => 'Simone',
                'surname' => 'Daglio',
                'email' => 'simone.daglio823@outlook.it',
                'password' => 'prova1234',
                'p_iva' => '23586934023',
                'business_name' => "L'Antico Cappello",
                'business_city' => "Alessandria",
                'business_cap' => "15012",
                'business_address' => 'Via Dei Cappellai N 48',
                'business_image' => "",
            ],

            [
                'name' => 'Alessandro',
                'surname' => 'Micalizzi',
                'email' => 'alessandro.micalizzi08@gmail.com',
                'password' => 'prova1234',
                'p_iva' => '12585639978',
                'business_name' => "Rosticceria Da Alessandro",
                'business_city' => "Messina",
                'business_cap' => "12567",
                'business_address' => "Via Dell'Arancino N 56",
                'business_image' => "",
            ],

            [
                'name' => 'Angelo',
                'surname' => 'Guarnieri',
                'email' => 'a@gmail.com',
                'password' => 'prova1234',
                'p_iva' => '99705645945',
                'business_name' => "La Brace Accesa",
                'business_city' => "Bari",
                'business_cap' => "67456",
                'business_address' => "Via La Brascioula N 234",
                'business_image' => "",
            ],

            [
                'name' => 'Giovanni',
                'surname' => 'Nicolosi',
                'email' => 'nicolosigiov@gmail.com',
                'password' => 'prova1234',
                'p_iva' => '07686639458',
                'business_name' => "Da Brando",
                'business_city' => "Catania",
                'business_cap' => "10784",
                'business_address' => "Via Col Vento N 100",
                'business_image' => "",
            ]
        ];

        // Foreach array users
        foreach($arrayUsers as $user) {

            // Creo un nuovo utente
            $new_user = new User();

            // Imposto le proprietà
            $new_user->name = $user['name'];
            $new_user->surname = $user['surname'];
            $new_user->email = $user['email'];
            $new_user->password = Hash::make($user['password']);
            $new_user->p_iva = $user['p_iva'];
            $new_user->business_name = $user['business_name'];
            $new_user->business_slug = Str::slug($new_user->business_name);
            $new_user->business_city = $user['business_city'];
            $new_user->business_cap = $user['business_cap'];
            $new_user->business_address = $user['business_address'];

            // Salvo il nuovo utente
            $new_user->save();
        }
    }
}
